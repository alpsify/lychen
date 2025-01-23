<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandAreaParameterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LandAreaParameterRepository::class)]
#[ApiResource]
class LandAreaParameter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'landAreaParameter', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LandArea $landArea = null;

    #[ORM\Column]
    private ?bool $aboveGround = false;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isAboveGround(): ?bool
    {
        return $this->aboveGround;
    }

    public function setAboveGround(bool $aboveGround): static
    {
        $this->aboveGround = $aboveGround;

        return $this;
    }
}
