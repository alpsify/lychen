<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandGreenhousePermission
{
    public const string PREFIX = 'landgreenhouse' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';

    public const array ALL = [
        self::READ,
        self::UPDATE,
        self::DELETE,
    ];
}
