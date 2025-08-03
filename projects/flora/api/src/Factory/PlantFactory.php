<?php

namespace App\Factory;

use App\Entity\Plant;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Plant>
 */
final class PlantFactory extends PersistentProxyObjectFactory
{

    public function __construct()
    {
    }

    public static function class(): string
    {
        return Plant::class;
    }


    protected function defaults(): array|callable
    {
        return [
            'cultivation' => CultivationFactory::new(),
            'name' => self::faker()->text(255),
            'perennial' => self::faker()->boolean(),
            'species' => SpeciesFactory::new(),
        ];
    }


    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Plant $plant): void {})
        ;
    }
}
