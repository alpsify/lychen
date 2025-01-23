<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Model\Abstract\AbstractIdOrmAndUlidApiIdentified;
use App\Model\Trait\CreatedAtTrait;
use App\Repository\LandAreaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: LandAreaRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class LandArea extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'landAreas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'landArea', cascade: ['persist', 'remove'])]
    private ?LandAreaSetting $landAreaSetting = null;

    #[ORM\OneToOne(mappedBy: 'landArea', cascade: ['persist', 'remove'])]
    private ?LandAreaParameter $landAreaParameter = null;

    public function __construct(?Ulid $ulid = null)
    {
        parent::__construct($ulid);
        $this->setLandAreaSetting(new LandAreaSetting());
        $this->setLandAreaParameter(new LandAreaParameter());
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(?Land $land): static
    {
        $this->land = $land;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLandAreaSetting(): ?LandAreaSetting
    {
        return $this->landAreaSetting;
    }

    public function setLandAreaSetting(LandAreaSetting $landAreaSetting): static
    {
        // set the owning side of the relation if necessary
        if ($landAreaSetting->getLandArea() !== $this) {
            $landAreaSetting->setLandArea($this);
        }

        $this->landAreaSetting = $landAreaSetting;

        return $this;
    }

    public function getLandAreaParameter(): ?LandAreaParameter
    {
        return $this->landAreaParameter;
    }

    public function setLandAreaParameter(LandAreaParameter $landAreaParameter): static
    {
        // set the owning side of the relation if necessary
        if ($landAreaParameter->getLandArea() !== $this) {
            $landAreaParameter->setLandArea($this);
        }

        $this->landAreaParameter = $landAreaParameter;

        return $this;
    }
}
