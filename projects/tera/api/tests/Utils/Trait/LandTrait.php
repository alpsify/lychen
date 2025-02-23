<?php

namespace App\Tests\Utils\Trait;

use App\Constant\LandKind;
use App\Entity\Land;
use App\Entity\Person;
use App\Factory\LandFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandTrait
{
    public static function landDataProvider(): array
    {
        return [
            [10, LandKind::INDIVIDUAL],
            [200, LandKind::INDIVIDUAL],
            [8700, LandKind::MARKET_GARDEN],
        ];
    }

    protected function createLand(Person $person): Land|Proxy
    {
        return LandFactory::new()->create([
            'owner' => $person
        ]);
    }
}
