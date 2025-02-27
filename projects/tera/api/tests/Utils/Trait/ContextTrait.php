<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Person;
use App\Tests\Utils\Model\LandTestContext;
use Zenstruck\Foundry\Persistence\Proxy;

trait ContextTrait
{
    protected function createLandContext(): LandTestContext
    {
        $owner = $this->createPerson();
        $land = $this->createLand($owner);

        return (new LandTestContext())->setLand($land)->setOwner($owner);
    }

    protected function addOneLandArea(LandTestContext $landTestContext): LandTestContext
    {
        $landArea = $this->createLandArea($landTestContext->land);

        $landTestContext->addLandArea($landArea);

        return $landTestContext;
    }

    protected function addOneLandGreenhouse(LandTestContext $landTestContext): LandTestContext
    {
        $landGreenhouse = $this->createLandGreenhouse($landTestContext->land);

        $landTestContext->addLandGreenhouse($landGreenhouse);

        return $landTestContext;
    }

    protected function addOneLandCultivationPlan(LandTestContext $landTestContext): LandTestContext
    {
        $landCultivationPlan = $this->createLandCultivationPlan($landTestContext->land);

        $landTestContext->addLandCultivationPlan($landCultivationPlan);

        return $landTestContext;
    }

    protected function addOneLandTask(LandTestContext $landTestContext): LandTestContext
    {
        $landTask = $this->createLandTask($landTestContext->land);

        $landTestContext->addLandTask($landTask);

        return $landTestContext;
    }

    protected function addOneLandRole(LandTestContext $landTestContext): LandTestContext
    {
        $landRole = $this->createLandRole($landTestContext->land);

        $landTestContext->addLandRole($landRole);

        return $landTestContext;
    }

    protected function addMember(LandTestContext $landTestContext, ?array $roles = null, Person|Proxy|null $person = null): LandTestContext
    {
        if (!$person) {
            $person = $this->createPerson();
        }
        $landMember = $this->createLandMember($landTestContext->land, $person, $roles);
        $landTestContext->addLandMember($landMember);

        return $landTestContext;
    }
}
