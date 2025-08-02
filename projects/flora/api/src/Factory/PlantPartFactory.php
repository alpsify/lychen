<?php

namespace App\Factory;

use App\Entity\PlantPart;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<PlantPart>
 */
final class PlantPartFactory extends PersistentProxyObjectFactory
{

    public function __construct()
    {
    }

    public static function class(): string
    {
        return PlantPart::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'plant' => PlantFactory::new(),
            'part' => PartFactory::new(),
        ];
    }

    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(PlantPart $exposure): void {})
            ;
    }
}
