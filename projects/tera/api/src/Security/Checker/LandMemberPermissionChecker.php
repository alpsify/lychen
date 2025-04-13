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
        return $landMember->isOwner() || in_array($permission, $landMember->getPermissions());
    }
}
