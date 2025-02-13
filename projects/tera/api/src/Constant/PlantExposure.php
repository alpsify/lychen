<?php

namespace App\Constant;

final class PlantExposure
{
    public const string FULL_SUN = 'full-sun';
    public const string PARTIAL_SHADE = 'partial-shade';
    public const string SHADE = 'shade';
    public const string BRIGHT_INDIRECT = 'bright-indirect';
    public const string ADAPTABLE = 'adaptable';

    public const array ALL = [
        self::FULL_SUN,
        self::PARTIAL_SHADE,
        self::SHADE,
        self::BRIGHT_INDIRECT,
        self::ADAPTABLE
    ];
}
