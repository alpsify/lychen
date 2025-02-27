<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandCultivationPlan;
use App\Factory\LandCultivationPlanFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandCultivationPlanTrait
{
    protected function createLandCultivationPlan(Land $land): LandCultivationPlan|Proxy
    {
        return LandCultivationPlanFactory::new()->create([
            'land' => $land
        ]);
    }
}
