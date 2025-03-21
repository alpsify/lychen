<?php

namespace App\Security\Constant;

use App\Security\Helper\PermissionManager;

final readonly class LandTaskPermission
{
    public const string PREFIX = 'landtask' . PermissionManager::SEPARATOR;

    public const string READ = self::PREFIX . 'read';
    public const string CREATE = self::PREFIX . 'create';
    public const string UPDATE = self::PREFIX . 'update';
    public const string DELETE = self::PREFIX . 'delete';
    public const string MARK_AS_DONE = self::PREFIX . 'mark_as_done';
    public const string MARK_AS_IN_PROGRESS = self::PREFIX . 'mark_as_in_progress';

    public const array ALL = [
        self::READ,
        self::CREATE,
        self::UPDATE,
        self::DELETE,
        self::MARK_AS_DONE,
        self::MARK_AS_IN_PROGRESS,
    ];
}
