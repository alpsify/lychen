<?php

namespace App\Story;

use App\Factory\ConsumptionMethodFactory;
use Zenstruck\Foundry\Story;

final class DefaultConsumptionMethodsStory extends Story
{

    public const array ALL = [

    ];

    public function build(): void
    {
        foreach (self::ALL as $code) {
            $this->addState($code, ConsumptionMethodFactory::new(['code' => $code])->create());
        }
    }
}
