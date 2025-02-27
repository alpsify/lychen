<?php

namespace App\Tests\Utils\Model;

use App\Entity\Land;
use App\Entity\LandArea;
use App\Entity\LandMember;
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
}
