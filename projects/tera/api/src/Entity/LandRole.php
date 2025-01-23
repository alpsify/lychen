<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Model\Abstract\AbstractIdOrmAndUlidApiIdentified;
use App\Model\Trait\CreatedAtTrait;
use App\Model\Trait\PositionTrait;
use App\Model\Trait\UpdatedAtTrait;
use App\Repository\LandRoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: LandRoleRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class LandRole extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use PositionTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'landRoles')]
    #[Gedmo\SortableGroup()]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column]
    private ?bool $canInviteSomeone = false;

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

    public function isCanInviteSomeone(): ?bool
    {
        return $this->canInviteSomeone;
    }

    public function setCanInviteSomeone(bool $canInviteSomeone): static
    {
        $this->canInviteSomeone = $canInviteSomeone;

        return $this;
    }
}
