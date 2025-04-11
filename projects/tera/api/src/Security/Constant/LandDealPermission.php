<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandDealPermission
{
    public const string PREFIX = 'landdeal' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string CREATE = self::PREFIX . 'create';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';

    public const array ALL = [
        self::READ,
        self::CREATE,
        self::UPDATE,
        self::DELETE,
    ];
}
