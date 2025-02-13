<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlantGlobalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantGlobalRepository::class)]
#[ApiResource]
class PlantGlobal extends Plant
{

}
