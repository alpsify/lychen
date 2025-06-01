<?php

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return static function (DefinitionConfigurator $definition): void {
    $definition->rootNode()
        ->children()
        ->arrayNode('user')
        ->children()
        ->scalarNode('class')->end()
        ->end()
        ->end() // user
        ->end();
};
