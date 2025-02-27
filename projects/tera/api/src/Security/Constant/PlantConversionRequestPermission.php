<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class PlantConversionRequestPermission
{
    public const string PREFIX = 'plant_conversion_request' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';

    public const array ALL = [
        self::READ,
        self::UPDATE,
        self::DELETE,
    ];
}
