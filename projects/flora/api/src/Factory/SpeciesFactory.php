<?php

namespace App\Factory;

use App\Entity\Species;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Species>
 */
final class SpeciesFactory extends PersistentProxyObjectFactory
{

    public function __construct()
    {
    }

    public static function class(): string
    {
        return Species::class;
    }


    protected function defaults(): array|callable
    {
        return [
            'code' => self::faker()->text(100),
            'family' => FamilyFactory::new(),
        ];
    }


    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Species $species): void {})
        ;
    }
}
