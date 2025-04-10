<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandProposalRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;

#[ORM\Entity(repositoryClass: LandProposalRepository::class)]
#[ApiResource]
class LandProposal extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(nullable: true)]
    private ?array $description = null;

    #[ORM\Column(length: 255)]
    private ?string $soilType = null;

    #[ORM\Column(length: 255)]
    private ?string $orientation = null;

    #[ORM\Column]
    private ?bool $hasParking = null;

    #[ORM\Column]
    private ?bool $hasTools = null;

    #[ORM\Column]
    private ?bool $hasShed = null;

    #[ORM\Column]
    private ?bool $hasWaterPoint = null;

    #[ORM\Column]
    private ?bool $hasIndependentAccess = null;

    #[ORM\Column(length: 255)]
    private ?string $gardenState = null;

    #[ORM\Column(length: 255)]
    private ?string $gardeningPreference = null;

    #[ORM\Column(length: 255)]
    private ?string $gardeningLevel = null;

    #[ORM\Column(length: 255)]
    private ?string $lookingForGardenerLevel = null;

    #[ORM\Column]
    private ?int $gardenTotalSurface = null;

    #[ORM\Column]
    private ?bool $foodSecurityParticipation = null;

    #[ORM\ManyToOne(inversedBy: 'landProposals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?array
    {
        return $this->description;
    }

    public function setDescription(?array $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSoilType(): ?string
    {
        return $this->soilType;
    }

    public function setSoilType(string $soilType): static
    {
        $this->soilType = $soilType;

        return $this;
    }

    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation): static
    {
        $this->orientation = $orientation;

        return $this;
    }

    public function hasParking(): ?bool
    {
        return $this->hasParking;
    }

    public function setHasParking(bool $hasParking): static
    {
        $this->hasParking = $hasParking;

        return $this;
    }

    public function hasTools(): ?bool
    {
        return $this->hasTools;
    }

    public function setHasTools(bool $hasTools): static
    {
        $this->hasTools = $hasTools;

        return $this;
    }

    public function hasShed(): ?bool
    {
        return $this->hasShed;
    }

    public function setHasShed(bool $hasShed): static
    {
        $this->hasShed = $hasShed;

        return $this;
    }

    public function hasWaterPoint(): ?bool
    {
        return $this->hasWaterPoint;
    }

    public function setHasWaterPoint(bool $hasWaterPoint): static
    {
        $this->hasWaterPoint = $hasWaterPoint;

        return $this;
    }

    public function hasIndependentAccess(): ?bool
    {
        return $this->hasIndependentAccess;
    }

    public function setHasIndependentAccess(bool $hasIndependentAccess): static
    {
        $this->hasIndependentAccess = $hasIndependentAccess;

        return $this;
    }

    public function getGardenState(): ?string
    {
        return $this->gardenState;
    }

    public function setGardenState(string $gardenState): static
    {
        $this->gardenState = $gardenState;

        return $this;
    }

    public function getGardeningPreference(): ?string
    {
        return $this->gardeningPreference;
    }

    public function setGardeningPreference(string $gardeningPreference): static
    {
        $this->gardeningPreference = $gardeningPreference;

        return $this;
    }

    public function getGardeningLevel(): ?string
    {
        return $this->gardeningLevel;
    }

    public function setGardeningLevel(string $gardeningLevel): static
    {
        $this->gardeningLevel = $gardeningLevel;

        return $this;
    }

    public function getLookingForGardenerLevel(): ?string
    {
        return $this->lookingForGardenerLevel;
    }

    public function setLookingForGardenerLevel(string $lookingForGardenerLevel): static
    {
        $this->lookingForGardenerLevel = $lookingForGardenerLevel;

        return $this;
    }

    public function getGardenTotalSurface(): ?int
    {
        return $this->gardenTotalSurface;
    }

    public function setGardenTotalSurface(int $gardenTotalSurface): static
    {
        $this->gardenTotalSurface = $gardenTotalSurface;

        return $this;
    }

    public function isFoodSecurityParticipation(): ?bool
    {
        return $this->foodSecurityParticipation;
    }

    public function setFoodSecurityParticipation(bool $foodSecurityParticipation): static
    {
        $this->foodSecurityParticipation = $foodSecurityParticipation;

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

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }
}
