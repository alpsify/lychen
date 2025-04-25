<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\PlantGlobalRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: PlantGlobalRepository::class)]
#[ApiResource]
#[GetCollection()]
#[Get()]
#[Post(security: 'is_granted("ROLE_ADMIN")')]
#[Patch(security: 'is_granted("ROLE_ADMIN")')]
#[Delete(security: 'is_granted("ROLE_ADMIN")')]
class PlantGlobal extends Plant
{
    /**
     * @var Collection<int, PlantConversionRequest>
     */
    #[ORM\OneToMany(targetEntity: PlantConversionRequest::class, mappedBy: 'mergeCandidate')]
    private Collection $plantConversionRequests;

    public function __construct()
    {
        parent::__construct();
        $this->plantConversionRequests = new ArrayCollection();
    }

    /**
     * @return Collection<int, PlantConversionRequest>
     */
    public function getPlantConversionRequests(): Collection
    {
        return $this->plantConversionRequests;
    }

    public function addPlantConversionRequest(PlantConversionRequest $plantConversionRequest): static
    {
        if (!$this->plantConversionRequests->contains($plantConversionRequest)) {
            $this->plantConversionRequests->add($plantConversionRequest);
            $plantConversionRequest->setMergeCandidate($this);
        }

        return $this;
    }

    public function removePlantConversionRequest(PlantConversionRequest $plantConversionRequest): static
    {
        if ($this->plantConversionRequests->removeElement($plantConversionRequest)) {
            // set the owning side to null (unless already changed)
            if ($plantConversionRequest->getMergeCandidate() === $this) {
                $plantConversionRequest->setMergeCandidate(null);
            }
        }

        return $this;
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getName(): ?string
    {
        return parent::getName();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getLatinName(): ?string
    {
        return parent::getLatinName();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function isPerpetual(): ?bool
    {
        return parent::isPerpetual();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getDaysToGerminationAverage(): ?int
    {
        return parent::getDaysToGerminationAverage();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getVariety(): ?string
    {
        return parent::getVariety();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getSowingMinimalTemperature(): ?int
    {
        return parent::getSowingMinimalTemperature();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getSowingOptimalTemperature(): ?int
    {
        return parent::getSowingOptimalTemperature();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getSowingMonths(): ?array
    {
        return parent::getSowingMonths();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getHarvestingMonths(): ?array
    {
        return parent::getHarvestingMonths();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function isBio(): ?bool
    {
        return parent::isBio();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getMaturity(): ?string
    {
        return parent::getMaturity();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getSoilType(): ?string
    {
        return parent::getSoilType();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getExposure(): ?string
    {
        return parent::getExposure();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getVegetationThreshold(): ?int
    {
        return parent::getVegetationThreshold();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getDaysToHarvestMin(): ?int
    {
        return parent::getDaysToHarvestMin();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getDaysToHarvestMax(): ?int
    {
        return parent::getDaysToHarvestMax();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getSpecies(): ?string
    {
        return parent::getSpecies();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getFamily(): ?array
    {
        return parent::getFamily();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getPlantingSpacingInCm(): ?int
    {
        return parent::getPlantingSpacingInCm();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return parent::getCreatedAt();
    }

    #[Groups(['plant_global:get', 'plant_global:collection'])]
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return parent::getUpdatedAt();
    }
}
