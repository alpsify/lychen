<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandMemberInvitation;
use App\Factory\LandMemberInvitationFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use function Zenstruck\Foundry\faker;

trait LandMemberInvitationTrait
{
    protected function createLandMemberInvitation(Land|Proxy $land, ?string $email, ?array $roles = null): LandMemberInvitation|Proxy
    {
        return LandMemberInvitationFactory::new()->create([
            'land' => $land,
            'email' => $email ?? faker()->email(),
            'landRoles' => $roles ?? [],
        ]);
    }
}
