<?php

namespace App\Workflow\LandArea;

final class LandAreaWorkflowTransition
{
    public const string ARCHIVE = 'archive';

    public const array TRANSITIONS = [
        self::ARCHIVE,
    ];
}
