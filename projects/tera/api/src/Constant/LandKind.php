<?php

namespace App\Constant;

final class LandKind
{
    public const string INDIVIDUAL = 'individual';
    public const string SHARED_GARDEN = "shared_garden";
    public const string MARKET_GARDEN = "market_garden";

    public const array ALL = [
        self::INDIVIDUAL,
        self::SHARED_GARDEN,
        self::MARKET_GARDEN,
    ];
}
