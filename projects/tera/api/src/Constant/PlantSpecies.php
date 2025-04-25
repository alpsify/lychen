<?php

namespace App\Constant;

final class PlantSpecies
{
    public const string LETTUCE = 'lactuca_sativa';
    public const string CABBAGE = 'brassica_oleracea';
    public const string TOMATO = 'solanum_lycopersicum';
    public const string CARROT = 'daucus_carota';
    public const string BEAN = 'phaseolus_vulgaris';
    public const string CUCUMBER = 'cucumis_sativus';

    public const array ALL = [
        self::LETTUCE,
        self::CABBAGE,
        self::TOMATO,
        self::CARROT,
        self::BEAN,
        self::CUCUMBER
    ];
}
