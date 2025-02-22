<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\Person;
use App\Factory\LandFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandTrait
{
    protected function createLand(Person $person): Land|Proxy
    {
        return LandFactory::new()->create([
            'owner' => $person
        ]);
    }
}
