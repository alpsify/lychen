<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandArea;
use App\Factory\LandAreaFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandAreaTrait
{
    protected function createLandArea(Land $land): LandArea|Proxy
    {
        return LandAreaFactory::new()->create([
            'land' => $land
        ]);
    }
}
