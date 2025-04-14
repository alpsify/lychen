<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use App\Repository\LandGreenhouseParameterRepository;
use App\Security\Interface\LandAwareInterface;
use App\Security\Voter\LandGreenhouseParameterVoter;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: LandGreenhouseParameterRepository::class)]
#[ApiResource]
#[Patch(security: "is_granted('" . LandGreenhouseParameterVoter::PATCH . "', previous_object)")]
#[Get(security: "is_granted('" . LandGreenhouseParameterVoter::GET . "', object)")]
class LandGreenhouseParameter extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    #[ORM\OneToOne(inversedBy: 'landGreenhouseParameter', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_greenhouse_parameter:get"])]
    private ?LandGreenhouse $landGreenhouse = null;

    #[Groups(["user:land_greenhouse_parameter:patch", "user:land_greenhouse_parameter:get"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    public function getLand(): ?Land
    {
        return $this->getLandGreenhouse()->getLand();
    }

    public function getLandGreenhouse(): ?LandGreenhouse
    {
        return $this->landGreenhouse;
    }

    public function setLandGreenhouse(LandGreenhouse $landGreenhouse): static
    {
        $this->landGreenhouse = $landGreenhouse;

        return $this;
    }
}
