<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class SeedStockEntryPermission
{
    public const string PREFIX = 'seedstockentry' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';

    public const array ALL = [
        self::READ,
        self::UPDATE,
        self::DELETE,
    ];
}
