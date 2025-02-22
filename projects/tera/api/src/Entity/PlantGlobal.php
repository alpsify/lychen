<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlantGlobalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantGlobalRepository::class)]
#[ApiResource]
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
}
