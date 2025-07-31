<?php

namespace App\Security\Checker;

use App\Entity\Person;

readonly class PersonPermissionChecker
{
    public function __construct()
    {
    }

    public function can(Person $person, string $permission): bool
    {
        return in_array($permission, $person->getPermissions());
    }
}
