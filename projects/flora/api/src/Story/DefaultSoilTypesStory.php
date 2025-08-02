<?php

namespace App\Story;

use App\Factory\SoilTypeFactory;
use Zenstruck\Foundry\Story;

final class DefaultSoilTypesStory extends Story
{
    public const string CLAY = 'clay';
    public const string SANDY = 'sandy';
    public const string SILTY = 'silty';
    public const string LOAMY = 'loamy';
    public const string PEATY = 'peaty';
    public const string CHALKY = 'chalky';
    public const string ROCKY = 'rocky';
    public const string HUMIFEROUS = 'humiferous';

    public const array ALL = [
        self::CLAY,
        self::SANDY,
        self::SILTY,
        self::LOAMY,
        self::PEATY,
        self::CHALKY,
        self::ROCKY,
        self::HUMIFEROUS,
    ];

    public function build(): void
    {
        foreach (self::ALL as $code) {
            $soilType = SoilTypeFactory::new(['code' => $code])->create();
            $this->addState($code, $soilType);
            $this->addToPool('all', $soilType);
        }
    }
}
