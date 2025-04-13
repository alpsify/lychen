<?php

namespace App\Security\Checker;

use App\Entity\PersonApiKey;

readonly class PersonApiKeyPermissionChecker
{
    public function __construct()
    {
    }

    public function can(PersonApiKey $personApiKey, string $permission): bool
    {
        return in_array($permission, $personApiKey->getPermissions());
    }
}
