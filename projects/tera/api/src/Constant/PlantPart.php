<?php

namespace App\Constant;

class PlantPart
{
    public const string ROOT = 'root';
    public const string STEM = 'stem';
    public const string LEAF = 'leaf';
    public const string FLOWER = 'flower';
    public const string FRUIT = 'fruit';
    public const string SEED = 'seed';
    public const string BULB = 'bulb';
    public const string TUBER = 'tuber';
    public const string RHIZOME = 'rhizome';

    public const array ALL = [
        self::ROOT,
        self::STEM,
        self::LEAF,
        self::FLOWER,
        self::FRUIT,
        self::SEED,
        self::BULB,
        self::TUBER,
        self::RHIZOME
    ];
}
