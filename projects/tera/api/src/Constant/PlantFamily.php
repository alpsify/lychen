<?php

namespace App\Constant;

final class PlantFamily
{
    public const string ASTERACEAE = 'asteraceae';
    public const string BRASSICACEAE = 'brassicaceae';
    public const string FABACEAE = 'fabaceae';
    public const string SOLANACEAE = 'solanaceae';
    public const string CUCURBITACEAE = 'cucurbitaceae';
    public const string LILIACEAE = 'liliaceae';

    public const array ALL = [
        self::ASTERACEAE,
        self::BRASSICACEAE,
        self::FABACEAE,
        self::SOLANACEAE,
        self::CUCURBITACEAE,
        self::LILIACEAE
    ];
}
