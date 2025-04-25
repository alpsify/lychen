<?php

namespace App\Security\Interface;

interface Permissionable
{
    public function getPermissionScope(): string;
}
