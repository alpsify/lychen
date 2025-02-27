<?php

namespace App\Factory;

use App\Entity\LandMemberInvitation;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<LandMemberInvitation>
 */
final class LandMemberInvitationFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return LandMemberInvitation::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'email' => self::faker()->email(),
        ];
    }

    protected function initialize(): static
    {
        return $this;
    }
}
