<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Constant\LandKinds;
use App\Repository\LandRepository;
use App\State\LandsLookingForMemberProvider;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandRepository::class)]
#[ApiResource(operations: [
    new GetCollection(uriTemplate: '/lands/looking_for_member', provider: LandsLookingForMemberProvider::class),
    new Get(),
    new GetCollection(),
    new Post(),
    new Patch(),
    new Delete()
]
)]
#[ORM\HasLifecycleCallbacks]
class Land extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, LandMember>
     */
    #[ORM\OneToMany(targetEntity: LandMember::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landMembers;

    #[ORM\OneToOne(mappedBy: 'land', cascade: ['persist', 'remove'])]
    private ?LandSetting $landSetting = null;

    /**
     * @var Collection<int, LandArea>
     */
    #[ORM\OneToMany(targetEntity: LandArea::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landAreas;

    /**
     * @var Collection<int, LandTask>
     */
    #[ORM\OneToMany(targetEntity: LandTask::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landTasks;

    /**
     * @var Collection<int, LandMemberInvitation>
     */
    #[ORM\OneToMany(targetEntity: LandMemberInvitation::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landMemberInvitations;

    /**
     * @var Collection<int, LandRole>
     */
    #[ORM\OneToMany(targetEntity: LandRole::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landRoles;

    #[ORM\Column(length: 150, options: ['default' => LandKinds::INDIVIDUAL])]
    #[Assert\Choice(LandKinds::ALL)]
    private ?string $kind = LandKinds::INDIVIDUAL;

    #[ORM\Column(nullable: true)]
    private ?int $surface = null;

    /**
     * @var Collection<int, LandCultivationPlan>
     */
    #[ORM\OneToMany(targetEntity: LandCultivationPlan::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landCultivationPlans;

    /**
     * @var Collection<int, SeedStock>
     */
    #[ORM\ManyToMany(targetEntity: SeedStock::class, inversedBy: 'lands')]
    private Collection $seedStocks;

    public function __construct(?Ulid $ulid = null)
    {
        parent::__construct($ulid);
        $this->landMembers = new ArrayCollection();
        $this->setLandSetting(new LandSetting());
        $this->landAreas = new ArrayCollection();
        $this->landTasks = new ArrayCollection();
        $this->landMemberInvitations = new ArrayCollection();
        $this->landRoles = new ArrayCollection();
        $this->landCultivationPlans = new ArrayCollection();
        $this->seedStocks = new ArrayCollection();
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
            $landMember->setLand($this);
        }

        return $this;
    }

    public function removeLandMember(LandMember $landMember): static
    {
        if ($this->landMembers->removeElement($landMember)) {
            // set the owning side to null (unless already changed)
            if ($landMember->getLand() === $this) {
                $landMember->setLand(null);
            }
        }

        return $this;
    }

    public function getLandSetting(): ?LandSetting
    {
        return $this->landSetting;
    }

    public function setLandSetting(LandSetting $landSetting): static
    {
        // set the owning side of the relation if necessary
        if ($landSetting->getLand() !== $this) {
            $landSetting->setLand($this);
        }

        $this->landSetting = $landSetting;

        return $this;
    }

    /**
     * @return Collection<int, LandArea>
     */
    public function getLandAreas(): Collection
    {
        return $this->landAreas;
    }

    public function addLandArea(LandArea $landArea): static
    {
        if (!$this->landAreas->contains($landArea)) {
            $this->landAreas->add($landArea);
            $landArea->setLand($this);
        }

        return $this;
    }

    public function removeLandArea(LandArea $landArea): static
    {
        if ($this->landAreas->removeElement($landArea)) {
            // set the owning side to null (unless already changed)
            if ($landArea->getLand() === $this) {
                $landArea->setLand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LandTask>
     */
    public function getLandTasks(): Collection
    {
        return $this->landTasks;
    }

    public function addLandTask(LandTask $landTask): static
    {
        if (!$this->landTasks->contains($landTask)) {
            $this->landTasks->add($landTask);
            $landTask->setLand($this);
        }

        return $this;
    }

    public function removeLandTask(LandTask $landTask): static
    {
        if ($this->landTasks->removeElement($landTask)) {
            // set the owning side to null (unless already changed)
            if ($landTask->getLand() === $this) {
                $landTask->setLand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LandMemberInvitation>
     */
    public function getLandMemberInvitations(): Collection
    {
        return $this->landMemberInvitations;
    }

    public function addLandMemberInvitation(LandMemberInvitation $landMemberInvitation): static
    {
        if (!$this->landMemberInvitations->contains($landMemberInvitation)) {
            $this->landMemberInvitations->add($landMemberInvitation);
            $landMemberInvitation->setLand($this);
        }

        return $this;
    }

    public function removeLandMemberInvitation(LandMemberInvitation $landMemberInvitation): static
    {
        if ($this->landMemberInvitations->removeElement($landMemberInvitation)) {
            // set the owning side to null (unless already changed)
            if ($landMemberInvitation->getLand() === $this) {
                $landMemberInvitation->setLand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LandRole>
     */
    public function getLandRoles(): Collection
    {
        return $this->landRoles;
    }

    public function addLandRole(LandRole $landRole): static
    {
        if (!$this->landRoles->contains($landRole)) {
            $this->landRoles->add($landRole);
            $landRole->setLand($this);
        }

        return $this;
    }

    public function removeLandRole(LandRole $landRole): static
    {
        if ($this->landRoles->removeElement($landRole)) {
            // set the owning side to null (unless already changed)
            if ($landRole->getLand() === $this) {
                $landRole->setLand(null);
            }
        }

        return $this;
    }

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(?int $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * @return Collection<int, LandCultivationPlan>
     */
    public function getLandCultivationPlans(): Collection
    {
        return $this->landCultivationPlans;
    }

    public function addLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if (!$this->landCultivationPlans->contains($landCultivationPlan)) {
            $this->landCultivationPlans->add($landCultivationPlan);
            $landCultivationPlan->setLand($this);
        }

        return $this;
    }

    public function removeLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if ($this->landCultivationPlans->removeElement($landCultivationPlan)) {
            // set the owning side to null (unless already changed)
            if ($landCultivationPlan->getLand() === $this) {
                $landCultivationPlan->setLand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SeedStock>
     */
    public function getSeedStocks(): Collection
    {
        return $this->seedStocks;
    }

    public function addSeedStock(SeedStock $seedStock): static
    {
        if (!$this->seedStocks->contains($seedStock)) {
            $this->seedStocks->add($seedStock);
        }

        return $this;
    }

    public function removeSeedStock(SeedStock $seedStock): static
    {
        $this->seedStocks->removeElement($seedStock);

        return $this;
    }
}
