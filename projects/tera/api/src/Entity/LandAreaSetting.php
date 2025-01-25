<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandAreaSettingRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;

#[ORM\Entity(repositoryClass: LandAreaSettingRepository::class)]
#[ApiResource]
class LandAreaSetting extends AbstractIdOrmAndUlidApiIdentified
{
    #[ORM\OneToOne(inversedBy: 'landAreaSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LandArea $landArea = null;

    #[ORM\Column]
    private ?bool $rotationActivated = false;

    public function getLandArea(): ?LandArea
    {
        return $this->landArea;
    }

    public function setLandArea(LandArea $landArea): static
    {
        $this->landArea = $landArea;

        return $this;
    }

    public function isRotationActivated(): ?bool
    {
        return $this->rotationActivated;
    }

    public function setRotationActivated(bool $rotationActivated): static
    {
        $this->rotationActivated = $rotationActivated;

        return $this;
    }
}
