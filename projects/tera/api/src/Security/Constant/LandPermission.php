<?php

namespace App\Security\Constant;

use App\Security\Voter\LandVoter;

final class LandPermission
{
    public const string PREFIX = 'land';

    public const string TASK_CREATE = 'land:land_task:create';
    public const string TASK_PATCH = 'land:land_task:patch';
    public const string TASK_DELETE = 'land:land_task:delete';
    public const string TASK_GET = 'land:land_task:get';
    public const string TASK_COLLECTION = 'land:land_task:collection';
    public const string TASK_MARK_AS_IN_PROGRESS = 'land:land_task:mark_as_in_progress';
    public const string TASK_MARK_AS_DONE = 'land:land_task:mark_as_done';

    public const array ALL = [
        ...LandVoter::ALL_LAND,
    ];
}
