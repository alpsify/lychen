<?php

namespace App\Constant;

final class LandInteractionMode
{
    public const string ALONE = 'alone';
    public const string TOGETHER = 'together';
    public const string TOGETHER_BUT_NOT_ALL_TIME = 'together_but_not_all_time';
    public const string NO_PREFERENCE = 'no_preference';

    public const array ALL = [
        self::ALONE,
        self::TOGETHER,
        self::TOGETHER_BUT_NOT_ALL_TIME,
        self::NO_PREFERENCE,
    ];
}
