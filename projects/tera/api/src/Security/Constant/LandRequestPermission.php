<?php

namespace App\Security\Constant;

use App\Security\Service\PermissionManager;
use JetBrains\PhpStorm\Deprecated;

#[Deprecated]
final readonly class LandRequestPermission
{
    public const string PREFIX = 'landrequest' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string CREATE = self::PREFIX . 'create';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';
    public const string PUBLISH = self::PREFIX . 'publish';
    public const string ARCHIVE = self::PREFIX . 'archive';

    public const array ALL = [
        self::READ,
        self::CREATE,
        self::UPDATE,
        self::DELETE,
        self::PUBLISH,
        self::ARCHIVE,
    ];
}
