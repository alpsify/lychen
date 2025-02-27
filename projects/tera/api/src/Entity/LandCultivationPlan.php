<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\LandCultivationPlanRepository;
use App\Security\Interface\LandAwareInterface;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;

#[ORM\Entity(repositoryClass: LandCultivationPlanRepository::class)]
#[ApiResource]
#[GetCollection()]
#[Post()]
#[Patch()]
#[Delete()]
#[Get()]
class LandCultivationPlan extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $endDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $expectedSowingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $sowingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $expectedPlantingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $plantingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $expectedHarvestingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $harvestingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $forecastedEndDate = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    #[ORM\ManyToOne(inversedBy: 'landCultivationPlans')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plant $plant = null;

    #[ORM\ManyToOne(inversedBy: 'landCultivationPlans')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\ManyToOne(inversedBy: 'landCultivationPlans')]
    private ?LandArea $landArea = null;

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getExpectedSowingDate(): ?DateTimeInterface
    {
        return $this->expectedSowingDate;
    }

    public function setExpectedSowingDate(?DateTimeInterface $expectedSowingDate): static
    {
        $this->expectedSowingDate = $expectedSowingDate;

        return $this;
    }

    public function getSowingDate(): ?DateTimeInterface
    {
        return $this->sowingDate;
    }

    public function setSowingDate(?DateTimeInterface $sowingDate): static
    {
        $this->sowingDate = $sowingDate;

        return $this;
    }

    public function getExpectedPlantingDate(): ?DateTimeInterface
    {
        return $this->expectedPlantingDate;
    }

    public function setExpectedPlantingDate(?DateTimeInterface $expectedPlantingDate): static
    {
        $this->expectedPlantingDate = $expectedPlantingDate;

        return $this;
    }

    public function getPlantingDate(): ?DateTimeInterface
    {
        return $this->plantingDate;
    }

    public function setPlantingDate(?DateTimeInterface $plantingDate): static
    {
        $this->plantingDate = $plantingDate;

        return $this;
    }

    public function getExpectedHarvestingDate(): ?DateTimeInterface
    {
        return $this->expectedHarvestingDate;
    }

    public function setExpectedHarvestingDate(?DateTimeInterface $expectedHarvestingDate): static
    {
        $this->expectedHarvestingDate = $expectedHarvestingDate;

        return $this;
    }

    public function getHarvestingDate(): ?DateTimeInterface
    {
        return $this->harvestingDate;
    }

    public function setHarvestingDate(?DateTimeInterface $harvestingDate): static
    {
        $this->harvestingDate = $harvestingDate;

        return $this;
    }

    public function getForecastedEndDate(): ?DateTimeInterface
    {
        return $this->forecastedEndDate;
    }

    public function setForecastedEndDate(?DateTimeInterface $forecastedEndDate): static
    {
        $this->forecastedEndDate = $forecastedEndDate;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getPlant(): ?Plant
    {
        return $this->plant;
    }

    public function setPlant(?Plant $plant): static
    {
        $this->plant = $plant;

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

    public function getLandArea(): ?LandArea
    {
        return $this->landArea;
    }

    public function setLandArea(?LandArea $landArea): static
    {
        $this->landArea = $landArea;

        return $this;
    }
}
