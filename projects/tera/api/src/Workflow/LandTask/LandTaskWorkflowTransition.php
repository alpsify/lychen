<?php

namespace App\Workflow\LandTask;

final class LandTaskWorkflowTransition
{
    public const string MARK_AS_IN_PROGRESS = 'mark_as_in_progress';
    public const string MARK_AS_DONE = 'mark_as_done';

    public const array TRANSITIONS = [
        self::MARK_AS_IN_PROGRESS,
        self::MARK_AS_DONE,
    ];
}
