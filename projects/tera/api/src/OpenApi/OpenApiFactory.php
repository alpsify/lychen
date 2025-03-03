<?php

namespace App\OpenApi;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Error;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\HttpOperation;
use ApiPlatform\Metadata\Operation as OperationMetadata;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Resource\Factory\ResourceMetadataCollectionFactoryInterface;
use ApiPlatform\Metadata\Resource\Factory\ResourceNameCollectionFactoryInterface;
use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\Model\Operation;
use ApiPlatform\OpenApi\Model\PathItem;
use ApiPlatform\OpenApi\OpenApi;
use ApiPlatform\OpenApi\Serializer\NormalizeOperationNameTrait;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;

#[AsDecorator(decorates: 'api_platform.openapi.factory')]
class OpenApiFactory implements OpenApiFactoryInterface
{
    use NormalizeOperationNameTrait;

    private ?RouteCollection $routeCollection = null;

    public function __construct(
        #[Autowire('@App\OpenApi\OpenApiFactory.inner')]
        private readonly OpenApiFactoryInterface                    $decorated,
        private readonly RouterInterface                            $router,
        private readonly ResourceNameCollectionFactoryInterface     $resourceNameCollectionFactory,
        private readonly ResourceMetadataCollectionFactoryInterface $resourceMetadataCollectionFactory,
    )
    {
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);

        foreach ($this->resourceNameCollectionFactory->create() as $resourceClass) {
            $resourceMetadataCollection = $this->resourceMetadataCollectionFactory->create($resourceClass);

            foreach ($resourceMetadataCollection as $resourceMetadata) {
                foreach ($resourceMetadata->getOperations() as $operation) {
                    if (!($operation instanceof HttpOperation)) {
                        continue;
                    }

                    if ($operation instanceof Error) {
                        continue;
                    }

                    $resourceClass = $operation->getClass() ?? $resourceMetadata->getClass();
                    $routeName = $operation->getRouteName() ?? $operation->getName();
                    if (!$this->routeCollection && $this->router) {
                        $this->routeCollection = $this->router->getRouteCollection();
                    }

                    if ($this->routeCollection && $routeName && $route = $this->routeCollection->get($routeName)) {
                        $path = $route->getPath();
                    } else {
                        $path = rtrim($operation->getRoutePrefix() ?? '', '/') . '/' . ltrim($operation->getUriTemplate(), '/');
                    }

                    $path = $this->getPath($path);

                    $method = strtolower($operation->getMethod());
                    //dump($path, $method);
                    $operationId = $this->generateOperationId($operation, $resourceClass, $path, $method);
                    //dump($operationId);
                    $pathItem = $openApi->getPaths()->getPath($path) ?? new PathItem();

                    $openApiOperation = $pathItem->{'get' . ucfirst($method)}() ?? new Operation();
                    $openApiOperation = $openApiOperation->withOperationId($operationId);
                    //dump($pathItem);

                    $pathItem = $pathItem->{'with' . ucfirst($method)}($openApiOperation);
                    $openApi->getPaths()->addPath($path, $pathItem);
                }
            }
        }
        return $openApi;
    }

    private function getPath(string $path): string
    {
        // Handle either API Platform's URI Template (rfc6570) or Symfony's route
        if (str_ends_with($path, '{._format}') || str_ends_with($path, '.{_format}')) {
            $path = substr($path, 0, -10);
        }

        return str_starts_with($path, '/') ? $path : '/' . $path;
    }

    private function generateOperationId(OperationMetadata $operation, string $resourceClass, string $path, string $method): string
    {
        if ($operation->getName() && !str_starts_with($operation->getName(), '_api_')) {
            return $operation->getName();
        }

        if ($operation instanceof GetCollection) {
            return 'get-collection';
        }

        if ($operation instanceof Get) {
            return 'get';
        }

        if ($operation instanceof Post) {
            return 'post';
        }

        if ($operation instanceof Patch) {
            return 'patch';
        }

        if ($operation instanceof Delete) {
            return 'delete';
        }

        return $this->normalizeOperationName($path . '_' . $method);
    }
}
