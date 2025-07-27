<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandHarvestEntry;
use App\Factory\LandHarvestEntryFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandHarvestEntryTrait
{
    protected function createLandHarvestEntry(Land $land, ?array $attributes = []): LandHarvestEntry|Proxy
    {
        return LandHarvestEntryFactory::new()->create([
            'land' => $land,
            ...$attributes
        ]);
    }
}
