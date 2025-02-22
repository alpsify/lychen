<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandPermission
{
    public const string PREFIX = 'land' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';
    public const string TRANSFER = self::PREFIX . 'transfer';

    public const array ALL = [
        self::READ,
        self::UPDATE,
        self::DELETE,
        self::TRANSFER,
    ];
}
