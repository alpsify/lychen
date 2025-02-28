<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandMember;
use App\Entity\Person;
use App\Factory\LandMemberFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandMemberTrait
{
    protected function createLandMember(Land|Proxy $land, Person|Proxy $person, ?array $roles = null): LandMember|Proxy
    {
        return LandMemberFactory::new()->create([
            'land' => $land,
            'person' => $person,
            'owner' => false,
            'landRoles' => $roles ?? [],
        ]);
    }
}
