<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandAreaParameterRepository;
use App\Security\Interface\LandAwareInterface;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;

#[ORM\Entity(repositoryClass: LandAreaParameterRepository::class)]
#[ApiResource]
class LandAreaParameter extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    #[ORM\OneToOne(inversedBy: 'landAreaParameter', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LandArea $landArea = null;

    #[ORM\Column]
    private ?bool $aboveGround = false;

    #[ORM\Column(nullable: true)]
    private ?int $width = null;

    #[ORM\Column(nullable: true)]
    private ?int $length = null;

    public function isAboveGround(): ?bool
    {
        return $this->aboveGround;
    }

    public function setAboveGround(bool $aboveGround): static
    {
        $this->aboveGround = $aboveGround;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getLand(): ?Land
    {
        return $this->getLandArea()->getLand();
    }

    public function getLandArea(): ?LandArea
    {
        return $this->landArea;
    }

    public function setLandArea(LandArea $landArea): static
    {
        $this->landArea = $landArea;

        return $this;
    }
}
