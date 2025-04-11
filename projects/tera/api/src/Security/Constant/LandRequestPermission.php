<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandRequestPermission
{
    public const string PREFIX = 'landrequest' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string PUBLISH = self::PREFIX . 'publish';
    public const string ARCHIVE = self::PREFIX . 'archive';

    public const array ALL = [
        self::READ,
    ];
}
