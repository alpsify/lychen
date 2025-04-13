<?php

namespace App\Security\Checker;

use App\Entity\LandMember;

readonly class LandMemberPermissionChecker
{
    public function __construct()
    {
    }

    public function can(LandMember $landMember, string $permission): bool
    {
        if ($landMember->isOwner()) {
            return true;
        }

        return in_array($permission, $landMember->getPermissions());
    }
}
