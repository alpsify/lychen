<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Model\Abstract\AbstractIdOrmAndUlidApiIdentified;
use App\Model\Trait\CreatedAtTrait;
use App\Repository\LandMemberInvitationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandMemberInvitationRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class LandMemberInvitation extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;

    #[ORM\ManyToOne(inversedBy: 'landMemberInvitations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email()]
    private ?string $email = null;

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(?Land $land): static
    {
        $this->land = $land;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
