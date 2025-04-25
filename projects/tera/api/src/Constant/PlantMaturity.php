<?php

namespace App\Constant;

final class PlantMaturity
{
    public const string VERY_EARLY = 'very_early';
    public const string EARLY = 'early';
    public const string MID_EARLY = 'mid_early';
    public const string STANDARD = 'standard';
    public const string MID_LATE = 'mid_late';
    public const string LATE = 'late';
    public const string VERY_LATE = 'very_late';

    public const array ALL = [
        self::VERY_EARLY,
        self::EARLY,
        self::MID_EARLY,
        self::STANDARD,
        self::MID_LATE,
        self::LATE,
        self::VERY_LATE
    ];
}
