<?php

namespace App\Workflow\PlantConversionRequest;

final class PlantConversionRequestWorkflowTransition
{
    public const string PUBLISH = 'publish';
    public const string MARK_AS_COMPLETED = 'mark_as_completed';

    public const array TRANSITIONS = [
        self::PUBLISH,
        self::MARK_AS_COMPLETED,
    ];
}
