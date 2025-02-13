<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlantCustomRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantCustomRepository::class)]
#[ApiResource]
class PlantCustom extends Plant
{
    #[ORM\Column]
    private ?bool $shared = null;

    #[ORM\ManyToOne(inversedBy: 'plantCustoms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    public function isShared(): ?bool
    {
        return $this->shared;
    }

    public function setShared(bool $shared): static
    {
        $this->shared = $shared;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }
}
