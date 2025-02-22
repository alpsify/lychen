<?php

namespace App\Serializer\ContextBuilder;


use ApiPlatform\State\SerializerContextBuilderInterface;
use ReflectionClass;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\HttpFoundation\Request;

#[AsDecorator('api_platform.serializer.context_builder')]
readonly class DynamicGroupsContextBuilder implements SerializerContextBuilderInterface
{

    public const string SEPARATOR = ':';

    public function __construct(private SerializerContextBuilderInterface $decorated)
    {
    }

    public function createFromRequest(Request $request, bool $normalization, ?array $extractedAttributes = null): array
    {
        $context = $this->decorated->createFromRequest($request, $normalization, $extractedAttributes);

        $context['groups'] = $context['groups'] ?? [];
        $context['groups'] = array_unique(array_merge($context['groups'], $this->generateGroups($context, $normalization)));
        return $context;
    }

    public function generateGroups(array $context, bool $normalization)
    {
        $resourceClass = $context['resource_class'] ?? null;

        $resourceClassShortName = (new ReflectionClass($resourceClass))->getShortName();
        $classAlias = strtolower(preg_replace('/[A-Z]/', '_\\0', lcfirst($resourceClassShortName)));

        $operationNameTab = explode('_', $context['operation_name'] ?? '');
        $operationName = end($operationNameTab);

        $groups = [
            // {userRole}:{resourceClass}:{operationName}
            sprintf('%s' . self::SEPARATOR . '%s' . self::SEPARATOR . '%s', 'user', $classAlias, $operationName)

        ];

        /*if ($resourceClassShortName === 'Land') {
            dd($groups);
        }*/

        return $groups;
    }
}
