<?php

namespace App\Security\Checker;

use App\Entity\LandApiKey;

readonly class LandApiKeyPermissionChecker
{
    public function __construct()
    {
    }

    public function can(LandApiKey $landApiKey, string $permission): bool
    {
        return in_array($permission, $landApiKey->getPermissions());
    }
}
