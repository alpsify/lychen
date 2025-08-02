<?php

namespace App\Story;

use App\Factory\ConsumptionMethodFactory;
use Zenstruck\Foundry\Story;

final class DefaultConsumptionMethodsStory extends Story
{
    public const string RAW = 'raw';
    public const string COOKED = 'cooked';
    public const string INFUSED = 'infused';
    public const string DRIED = 'dried';
    public const string FERMENTED = 'fermented';
    public const string PRESSED = 'pressed';
    public const string MACERATED = 'macerated';
    public const string POWDERED = 'powdered';

    public const array ALL = [
        self::RAW,
        self::COOKED,
        self::INFUSED,
        self::DRIED,
        self::FERMENTED,
        self::PRESSED,
        self::MACERATED,
        self::POWDERED,
    ];

    public function build(): void
    {
        foreach (self::ALL as $code) {
            $this->addState($code, ConsumptionMethodFactory::new(['code' => $code])->create());
        }
    }
}
