<?php

namespace App\Security\Constant;

use App\Security\Service\PermissionManager;
use JetBrains\PhpStorm\Deprecated;

#[Deprecated]
final readonly class LandAreaSettingPermission
{
    public const string PREFIX = 'landareasetting' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';

    public const array ALL = [
        self::READ,
        self::UPDATE,
    ];
}
