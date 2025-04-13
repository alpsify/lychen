<?php

namespace App\Security\Constant;

use App\Security\Service\PermissionManager;
use JetBrains\PhpStorm\Deprecated;

#[Deprecated]
final readonly class LandMemberInvitationPermission
{
    public const string PREFIX = 'landmemberinvitation' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string CREATE = self::PREFIX . 'create';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';
    public const string ACCEPT = self::PREFIX . 'accept';
    public const string REFUSE = self::PREFIX . 'refuse';

    public const array ALL = [
        self::READ,
        self::CREATE,
        self::UPDATE,
        self::DELETE,
        self::ACCEPT,
        self::REFUSE,
    ];

    public const array LAND_MEMBER_RELATED = [
        self::READ,
        self::CREATE,
        self::UPDATE,
        self::DELETE,
    ];
}
