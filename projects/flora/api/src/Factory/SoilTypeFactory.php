<?php

namespace App\Factory;

use App\Entity\SoilType;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<SoilType>
 */
final class SoilTypeFactory extends PersistentProxyObjectFactory
{

    public function __construct()
    {
    }

    public static function class(): string
    {
        return SoilType::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'code' => self::faker()->text(100),
        ];
    }

    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(SoilType $exposure): void {})
            ;
    }
}
