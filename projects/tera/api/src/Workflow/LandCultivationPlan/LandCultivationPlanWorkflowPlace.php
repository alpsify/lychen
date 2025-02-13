<?php

namespace App\Workflow\LandCultivationPlan;

final class LandCultivationPlanWorkflowPlace
{
    public const string ACTIVE = 'active';
    public const string DRAFT = 'draft';

    public const array PLACES = [
        self::ACTIVE,
        self::DRAFT,
    ];
}
