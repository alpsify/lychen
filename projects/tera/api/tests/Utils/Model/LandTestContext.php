<?php

namespace App\Tests\Utils\Model;

use App\Entity\Land;
use App\Entity\LandArea;
use App\Entity\LandCultivationPlan;
use App\Entity\LandGreenhouse;
use App\Entity\LandMember;
use App\Entity\LandMemberInvitation;
use App\Entity\LandRole;
use App\Entity\LandTask;
use App\Entity\Person;
use Zenstruck\Foundry\Persistence\Proxy;

class LandTestContext
{
    public Person|Proxy $owner;
    public Land|Proxy $land;

    /** @var LandArea|Proxy[] */
    public array $landAreas;

    /** @var LandMember|Proxy[] */
    public array $landMembers;

    /** @var LandGreenhouse|Proxy[] */
    public array $landGreenhouses;

    /** @var LandCultivationPlan|Proxy[] */
    public array $landCultivationPlans;

    /** @var LandTask|Proxy[] */
    public array $landTasks;

    /** @var LandRole|Proxy[] */
    public array $landRoles;

    /** @var LandMemberInvitation|Proxy[] */
    public array $landMemberInvitations;

    public function setOwner(Person|Proxy $owner): static
    {
        $this->owner = $owner;
        return $this;
    }

    public function setLand(Land|Proxy $land): static
    {
        $this->land = $land;
        return $this;
    }

    public function addLandArea(LandArea|Proxy $landArea): static
    {
        $this->landAreas[] = $landArea;
        return $this;
    }

    public function addLandMember(LandMember|Proxy $landMember): static
    {
        $this->landMembers[] = $landMember;
        return $this;
    }

    public function addLandGreenhouse(LandGreenhouse|Proxy $landGreenhouse): static
    {
        $this->landGreenhouses[] = $landGreenhouse;
        return $this;
    }

    public function addLandCultivationPlan(LandCultivationPlan|Proxy $landCultivationPlan): static
    {
        $this->landCultivationPlans[] = $landCultivationPlan;
        return $this;
    }

    public function addLandTask(LandTask|Proxy $landTask): static
    {
        $this->landTasks[] = $landTask;
        return $this;
    }

    public function addLandRole(LandRole|Proxy $landRole): static
    {
        $this->landRoles[] = $landRole;
        return $this;
    }

    public function addLandMemberInvitation(LandMemberInvitation|Proxy $landMemberInvitation): static
    {
        $this->landMemberInvitations[] = $landMemberInvitation;
        return $this;
    }
}
