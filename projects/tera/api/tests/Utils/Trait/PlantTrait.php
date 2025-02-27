<?php

namespace App\Tests\Utils\Trait;

use App\Entity\LandCultivationPlan;
use App\Factory\PlantCustomFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait PlantTrait
{
    protected function createPlantCustom(): LandCultivationPlan|Proxy
    {
        return PlantCustomFactory::new()->create([
            
        ]);
    }
}
