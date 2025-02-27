<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandMemberSettingPermission
{
    public const string PREFIX = 'landmembersetting' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string UPDATE = self::PREFIX . 'update';

    public const array ALL = [
        self::READ,
        self::UPDATE,
    ];
}
