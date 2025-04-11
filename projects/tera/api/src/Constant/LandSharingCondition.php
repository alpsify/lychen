<?php

namespace App\Constant;

final class LandSharingCondition
{
    public const string GENERAL_MAINTENANCE = 'general_maintenance';
    public const string GARDENING = 'gardening';
    public const string BEEHIVE = 'beehives';
    public const string VEGETABLE_SHARING = 'vegetable_sharing';
    public const string FRUIT_SHARING = 'fruit_sharing';
    public const string FLOWER_PLANTING = 'flower_planting';
    public const string TREE_PLANTING = 'tree_planting';
    public const string MUSHROOM_CULTIVATING = 'mushroom_cultivating';

    public const array ALL = [
        self::GENERAL_MAINTENANCE,
        self::BEEHIVE,
        self::GARDENING,
        self::VEGETABLE_SHARING,
        self::FRUIT_SHARING,
        self::FLOWER_PLANTING,
        self::TREE_PLANTING,
        self::MUSHROOM_CULTIVATING
    ];
}
