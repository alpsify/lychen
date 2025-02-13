<?php

namespace App\Constant;

final class PlantSpecies
{
    public const string LETTUCE = 'lactuca-sativa';
    public const string CABBAGE = 'brassica-oleracea';
    public const string TOMATO = 'solanum-lycopersicum';
    public const string CARROT = 'daucus-carota';
    public const string BEAN = 'phaseolus-vulgaris';
    public const string CUCUMBER = 'cucumis-sativus';

    public const array ALL = [
        self::LETTUCE,
        self::CABBAGE,
        self::TOMATO,
        self::CARROT,
        self::BEAN,
        self::CUCUMBER
    ];
}
