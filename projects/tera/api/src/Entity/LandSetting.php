<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use App\Model\Abstract\AbstractIdOrmAndUlidApiIdentified;
use App\Repository\LandSettingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LandSettingRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Patch()
]
)]
class LandSetting extends AbstractIdOrmAndUlidApiIdentified
{
    #[ORM\OneToOne(inversedBy: 'landSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column]
    private ?bool $lookingForMember = false;

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(Land $land): static
    {
        $this->land = $land;

        return $this;
    }

    public function isLookingForMember(): ?bool
    {
        return $this->lookingForMember;
    }

    public function setLookingForMember(bool $lookingForMember): static
    {
        $this->lookingForMember = $lookingForMember;

        return $this;
    }
}
