<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandDeal;
use App\Entity\Person;
use App\Factory\LandDealFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandDealTrait
{
    protected function createLandDeal(Land|Proxy $land, Person|Proxy $person, array $attributes = null): LandDeal|Proxy
    {
        return LandDealFactory::new()->create(array_merge([
            'land' => $land,
            'person' => $person,
        ], $attributes ?? []));
    }
}
