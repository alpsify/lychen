<?php

namespace App\Security\Constant;

use App\Security\Service\PermissionManager;
use JetBrains\PhpStorm\Deprecated;

#[Deprecated]
final readonly class LandAreaParameterPermission
{
    public const string PREFIX = 'landareaparameter' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';

    public const array ALL = [
        self::READ,
        self::UPDATE,
    ];
}
