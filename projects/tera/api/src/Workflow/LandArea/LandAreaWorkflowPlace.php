<?php

namespace App\Workflow\LandArea;

final class LandAreaWorkflowPlace
{
    public const string ACTIVE = 'active';
    public const string ARCHIVED = 'archived';

    public const array PLACES = [
        self::ACTIVE,
        self::ARCHIVED,
    ];
}
