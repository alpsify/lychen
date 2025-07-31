<?php

namespace App\Security\Interface;

interface PermissionHolder
{
    public function getPermissions(): array;
}
