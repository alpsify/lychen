<?php

namespace App\Workflow\LandCultivationPlan;

final class LandCultivationPlanWorkflowTransition
{
    public const string ARCHIVE = 'archive';

    public const array TRANSITIONS = [
        self::ARCHIVE,
    ];
}
