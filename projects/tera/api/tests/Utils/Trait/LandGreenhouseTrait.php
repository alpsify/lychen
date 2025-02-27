<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandGreenhouse;
use App\Factory\LandGreenhouseFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandGreenhouseTrait
{
    protected function createLandGreenhouse(Land $land): LandGreenhouse|Proxy
    {
        return LandGreenhouseFactory::new()->create([
            'land' => $land
        ]);
    }
}
