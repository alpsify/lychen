<?php

namespace App\Tests\Utils\Trait;

use App\Constant\LandAreaKind;
use App\Entity\Land;
use App\Entity\Person;
use App\Factory\LandFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandTrait
{
    public static function landDataProvider(): array
    {
        return [
            [10, LandAreaKind::OPEN_SOIL],
            [200, LandAreaKind::OPEN_SOIL],
            [8700, LandAreaKind::SOIL_LESS],
        ];
    }

    protected function createLand(Person $person): Land|Proxy
    {
        return LandFactory::new()->create([
            'owner' => $person
        ]);
    }
}
