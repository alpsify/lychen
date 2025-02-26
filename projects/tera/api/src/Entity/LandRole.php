<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandRoleRepository;
use App\Security\Constant\Permissions;
use App\Security\Interface\LandAwareInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\PositionTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandRoleRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class LandRole extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
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

    /**
     * @var Collection<int, LandMember>
     */
    #[ORM\ManyToMany(targetEntity: LandMember::class, mappedBy: 'landRoles')]
    private Collection $landMembers;

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(Permissions::ALL, multiple: true)]
    private ?array $permissions = null;

    public function __construct()
    {
        parent::__construct();
        $this->landMembers = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, LandMember>
     */
    public function getLandMembers(): Collection
    {
        return $this->landMembers;
    }

    public function addLandMember(LandMember $landMember): static
    {
        if (!$this->landMembers->contains($landMember)) {
            $this->landMembers->add($landMember);
            $landMember->addLandRole($this);
        }

        return $this;
    }

    public function removeLandMember(LandMember $landMember): static
    {
        if ($this->landMembers->removeElement($landMember)) {
            $landMember->removeLandRole($this);
        }

        return $this;
    }

    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function setPermissions(?array $permissions): static
    {
        $this->permissions = $permissions;

        return $this;
    }
}
