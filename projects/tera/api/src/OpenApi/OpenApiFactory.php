<?php

namespace App\OpenApi;

use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\OpenApi;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

// Import HttpOperation

// Import OpenApi Operation model

// Import PathItem

// Keep if needed for operationId generation

// Import ReflectionClass

// Remove unused RouterInterface and RouteCollection if not needed for path generation
// use Symfony\Component\Routing\RouteCollection;
// use Symfony\Component\Routing\RouterInterface;

#[AsDecorator(decorates: 'api_platform.openapi.factory')]
class OpenApiFactory implements OpenApiFactoryInterface
{
    // Keep if needed for operationId generation
    // use NormalizeOperationNameTrait;

    // Remove if not used
    // private ?RouteCollection $routeCollection = null;

    public function __construct(
        #[Autowire('@App\OpenApi\OpenApiFactory.inner')]
        private readonly OpenApiFactoryInterface $decorated,
    )
    {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);
        return $openApi;
    }
    /*$paths = $openApi->getPaths();

    foreach ($this->resourceNameCollectionFactory->create() as $resourceClass) {
        $resourceMetadataCollection = $this->resourceMetadataCollectionFactory->create($resourceClass);

        foreach ($resourceMetadataCollection as $resourceMetadata) {
            // Generate the resource alias once per resource
            $resourceAlias = $this->generateResourceAlias($resourceClass);

            if (!$resourceAlias) {
                continue; // Skip if alias generation fails
            }

            foreach ($resourceMetadata->getOperations() as $operationMetadata) {

                // Ensure it's an HTTP operation with a method and path
                if (!($operationMetadata instanceof HttpOperation) || !$operationMetadata->getMethod() || !$operationMetadata->getUriTemplate()) {
                    continue;
                }

                // Skip ApiPlatform's internal Error resource if desired
                if ($operationMetadata instanceof Error) {
                    continue;
                }

                $method = strtolower($operationMetadata->getMethod());
                $path = $this->normalizePath($operationMetadata->getUriTemplate()); // Use a helper to normalize path

                // Find the corresponding PathItem and Operation in the OpenApi object
                if (!($pathItem = $paths->getPath('/api' . $path))) {
                    // This shouldn't typically happen if the decorated factory ran correctly
                    continue;
                }
                dd($paths);
                if ($resourceAlias === 'land_task') {
                    if ($method === 'patch') {
                        dd($paths, $resourceAlias, $method, $path, $pathItem);
                    }
                }

                $operation = $this->getOperationFromPathItem($pathItem, $method);
                if (!$operation) {
                    continue;
                }

                // Generate the default groups based on resource and operation type
                $operationAlias = $this->getOperationAlias($operationMetadata); // e.g., 'get', 'post', 'patch'
                if (!$operationAlias) {
                    continue;
                }

                $defaultNormalizationGroups = [
                    sprintf('%s:%s', $resourceAlias, $operationAlias), // e.g., land_task:patch
                    sprintf('%s:%s:output', $resourceAlias, $operationAlias), // e.g., land_task:patch:output
                ];
                $defaultDenormalizationGroups = [
                    sprintf('%s:%s', $resourceAlias, $operationAlias), // e.g., land_task:patch
                    sprintf('%s:%s:input', $resourceAlias, $operationAlias), // e.g., land_task:patch:input
                ];


                // --- Merge with existing groups ---

                // Get existing groups (defined statically in attributes or by previous decorators)
                $existingNormalizationGroups = $operation->getNormalizationContext()['groups'] ?? [];
                $existingDenormalizationGroups = $operation->getDenormalizationContext()['groups'] ?? [];

                // Merge default groups with existing ones, ensuring uniqueness
                // Prioritize existing groups if needed, or just merge them all.
                // Here, we add defaults without overriding existing ones explicitly defined.
                $finalNormalizationGroups = array_unique(array_merge($existingNormalizationGroups,
                    $defaultNormalizationGroups));
                $finalDenormalizationGroups = array_unique(array_merge($existingDenormalizationGroups,
                    $defaultDenormalizationGroups));

                // --- Update the Operation object ---
                $updatedOperationContext = [];
                if (!empty($finalNormalizationGroups)) {
                    $updatedOperationContext['normalizationContext']['groups'] = $finalNormalizationGroups;
                }
                if (!empty($finalDenormalizationGroups)) {
                    $updatedOperationContext['denormalizationContext']['groups'] = $finalDenormalizationGroups;
                }

                // Use `withNormalizationContext` and `withDenormalizationContext` to update immutably
                if (isset($updatedOperationContext['normalizationContext'])) {
                    $operation = $operation->withNormalizationContext(
                        array_merge($operation->getNormalizationContext() ?? [],
                            $updatedOperationContext['normalizationContext'])
                    );
                }
                if (isset($updatedOperationContext['denormalizationContext'])) {
                    $operation = $operation->withDenormalizationContext(
                        array_merge($operation->getDenormalizationContext() ?? [],
                            $updatedOperationContext['denormalizationContext'])
                    );
                }

                // Update the PathItem with the modified Operation
                $pathItem = $this->updateOperationInPathItem($pathItem, $method, $operation);
                $paths->addPath($path, $pathItem); // Update the paths collection
            }
        }
    }
    return $openApi;
}

// --- Helper Methods ---

private function generateResourceAlias(string $resourceClass): ?string
{
    if (!class_exists($resourceClass)) {
        return null;
    }
    try {
        $reflectionClass = new ReflectionClass($resourceClass);
        $shortName = $reflectionClass->getShortName();
        // Use the same logic as your DynamicGroupsContextBuilder for consistency
        return strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $shortName));
    } catch (ReflectionException $e) {
        // Log error if needed
        return null;
    }
}

private function normalizePath(string $uriTemplate): string
{
    // Basic normalization, adjust if your paths have specific formats
    if (str_ends_with($uriTemplate, '{._format}') || str_ends_with($uriTemplate, '.{_format}')) {
        $uriTemplate = substr($uriTemplate, 0, -10);
    }
    return str_starts_with($uriTemplate, '/') ? $uriTemplate : '/' . $uriTemplate;
}

private function getOperationFromPathItem(PathItem $pathItem, string $method): ?Operation
{
    $getter = 'get' . ucfirst($method);
    return method_exists($pathItem, $getter) ? $pathItem->{$getter}() : null;
}

private function getOperationAlias(\ApiPlatform\Metadata\Operation $operation): ?string
{
    // Determine a simple alias like 'get', 'post', 'patch', 'delete', 'collection'
    if ($operation instanceof GetCollection) return 'collection';
    if ($operation instanceof Get) return 'get';
    if ($operation instanceof Post) return 'post';
    if ($operation instanceof Patch) return 'patch';
    if ($operation instanceof Delete) return 'delete';

    // Fallback for custom operations - might need refinement based on naming conventions
    // Extract from operation name if possible, otherwise use method
    $name = $operation->getName();
    if ($name && !str_starts_with($name, '_api_')) {
        // Basic extraction, adjust as needed
        $parts = explode('_', $name);
        return end($parts);
    }

    return strtolower($operation->getMethod());
}

private function updateOperationInPathItem(PathItem $pathItem, string $method, Operation $operation): PathItem
{
    $wither = 'with' . ucfirst($method);
    return method_exists($pathItem, $wither) ? $pathItem->{$wither}($operation) : $pathItem;
}*/
}
