<?php

namespace App\Workflow\PlantConversionRequest;

final class PlantConversionRequestWorkflowPlace
{
    public const string OPENED = 'opened';
    public const string COMPLETED = 'completed';
    public const string PUBLISHED = 'published';

    public const array PLACES = [
        self::OPENED,
        self::COMPLETED,
        self::PUBLISHED,
    ];
}
