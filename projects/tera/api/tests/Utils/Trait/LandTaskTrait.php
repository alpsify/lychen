<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandTask;
use App\Factory\LandTaskFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandTaskTrait
{
    protected function createLandTask(Land $land, ?array $attributes = []): LandTask|Proxy
    {
        return LandTaskFactory::new()->create([
            'land' => $land,
            ...$attributes
        ]);
    }
}
