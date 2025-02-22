<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlantCustomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantCustomRepository::class)]
#[ApiResource]
class PlantCustom extends Plant
{
    #[ORM\ManyToOne(inversedBy: 'plantCustoms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\OneToOne(mappedBy: 'plantCustom', cascade: ['persist', 'remove'])]
    private ?PlantConversionRequest $plantConversionRequest = null;

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getPlantConversionRequest(): ?PlantConversionRequest
    {
        return $this->plantConversionRequest;
    }

    public function setPlantConversionRequest(PlantConversionRequest $plantConversionRequest): static
    {
        // set the owning side of the relation if necessary
        if ($plantConversionRequest->getPlantCustom() !== $this) {
            $plantConversionRequest->setPlantCustom($this);
        }

        $this->plantConversionRequest = $plantConversionRequest;

        return $this;
    }
}
