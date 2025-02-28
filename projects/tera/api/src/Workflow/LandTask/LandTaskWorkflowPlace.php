<?php

namespace App\Workflow\LandTask;

final class LandTaskWorkflowPlace
{
    public const string TO_BE_DONE = 'to_be_done';
    public const string IN_PROGRESS = 'in_progress';
    public const string DONE = 'done';

    public const array PLACES = [
        self::TO_BE_DONE,
        self::IN_PROGRESS,
        self::DONE,
    ];
}
