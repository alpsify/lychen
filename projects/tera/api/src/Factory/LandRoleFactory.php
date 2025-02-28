<?php

namespace App\Factory;

use App\Entity\LandRole;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<LandRole>
 */
final class LandRoleFactory extends PersistentProxyObjectFactory
{
    public function __construct()
    {
    }

    public static function class(): string
    {
        return LandRole::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->text(255),
            //'permissions' => []
        ];
    }

    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(LandRole $landRole): void {})
            ;
    }
}
