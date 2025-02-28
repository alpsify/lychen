<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandGreenhouseParameterPermission
{
    public const string PREFIX = 'landgreenhouseparameter' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';

    public const array ALL = [
        self::READ,
        self::UPDATE,
    ];
}
