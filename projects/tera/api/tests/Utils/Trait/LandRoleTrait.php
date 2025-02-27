<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandRole;
use App\Factory\LandRoleFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandRoleTrait
{
    protected function createLandRole(Land|Proxy $land, array $permissions = null): LandRole|Proxy
    {
        return LandRoleFactory::new()->create([
            'land' => $land,
            'permissions' => $permissions,
        ]);
    }
}
