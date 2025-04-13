<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\LandRepository;
use App\Security\Voter\LandVoter;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandRepository::class)]
#[ApiResource()]
#[Patch(
    denormalizationContext: ['groups' => ['user:land:patch']],
    security: "is_granted('" . LandVoter::PATCH . "', previous_object)",)
]
#[Delete(security: "is_granted('" . LandVoter::DELETE . "', object)")]
#[Get(
    normalizationContext: ['groups' => ['user:land:get']],
    security: "is_granted('" . LandVoter::GET . "', object)")
]
#[GetCollection(
    normalizationContext: ['groups' => ['user:land:collection']],
    security: "is_granted('" . LandVoter::COLLECTION . "')",
)]
#[Post(
    denormalizationContext: ['groups' => ['user:land:post']],
    security: "is_granted('" . LandVoter::POST . "')",
)]
#[ORM\HasLifecycleCallbacks]
class Land extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    /** @var Person|null Used by fixtures to create custom land with owner */
    public ?Person $owner = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land:get-collection-looking-for-members", "user:land:collection", "user:land:get", "user:land:patch", "user:land:post", "user:land_member_invitation:collection-by-email"])]
    private ?string $name = null;

    /**
     * @var Collection<int, LandMember>
     */
    #[ORM\OneToMany(targetEntity: LandMember::class, mappedBy: 'land', orphanRemoval: true)]
    #[Groups(["user:land:collection", "user:land:get"])]
    private Collection $landMembers;

    #[ORM\OneToOne(mappedBy: 'land', cascade: ['persist', 'remove'])]
    #[Groups(["user:land:collection", "user:land:get"])]
    private ?LandSetting $landSetting = null;

    /**
     * @var Collection<int, LandArea>
     */
    #[ORM\OneToMany(targetEntity: LandArea::class, mappedBy: 'land', orphanRemoval: true)]
    #[Groups(["user:land:collection", "user:land:get", "user:land:patch", "user:land:post"])]
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

    #[ORM\Column(nullable: true)]
    #[Assert\GreaterThanOrEqual(0)]
    #[Groups(["user:land:get-collection-looking-for-members", "user:land:collection", "user:land:get", "user:land:patch", "user:land:post"])]
    private ?int $surface = null;

    /**
     * @var Collection<int, LandCultivationPlan>
     */
    #[ORM\OneToMany(targetEntity: LandCultivationPlan::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landCultivationPlans;

    /**
     * @var Collection<int, LandRole>
     */
    #[ORM\OneToMany(targetEntity: LandRole::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landRoles;

    #[ORM\OneToOne(cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?LandRole $defaultRole = null;

    /**
     * @var Collection<int, LandGreenhouse>
     */
    #[ORM\OneToMany(targetEntity: LandGreenhouse::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landGreenhouses;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land:get-collection-looking-for-members", "user:land:collection", "user:land:get", "user:land:patch", "user:land:post"])]
    private ?int $altitude = 1;

    /**
     * @var Collection<int, LandProposal>
     */
    #[ORM\OneToMany(targetEntity: LandProposal::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landProposals;

    /**
     * @var Collection<int, LandDeal>
     */
    #[ORM\OneToMany(targetEntity: LandDeal::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landDeals;

    #[ORM\OneToOne(cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private ?Address $address = null;

    /**
     * @var Collection<int, LandApiKey>
     */
    #[ORM\OneToMany(targetEntity: LandApiKey::class, mappedBy: 'land', orphanRemoval: true)]
    private Collection $landApiKeys;

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
        $this->landGreenhouses = new ArrayCollection();
        $this->landProposals = new ArrayCollection();
        $this->landDeals = new ArrayCollection();
        $this->landApiKeys = new ArrayCollection();
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

    #[Groups(["user:land:get-collection-looking-for-members", "user:land:collection", "user:land:get", "user:land:patch", "user:land:post"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land:get", "user:land:patch"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land:get", "user:land:patch"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
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

    public function getLand(): static
    {
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

    public function getDefaultRole(): ?LandRole
    {
        return $this->defaultRole;
    }

    public function setDefaultRole(?LandRole $defaultRole): static
    {
        $this->defaultRole = $defaultRole;

        return $this;
    }

    /**
     * @return Collection<int, LandGreenhouse>
     */
    public function getLandGreenhouses(): Collection
    {
        return $this->landGreenhouses;
    }

    public function addLandGreenhouse(LandGreenhouse $landGreenhouse): static
    {
        if (!$this->landGreenhouses->contains($landGreenhouse)) {
            $this->landGreenhouses->add($landGreenhouse);
            $landGreenhouse->setLand($this);
        }

        return $this;
    }

    public function removeLandGreenhouse(LandGreenhouse $landGreenhouse): static
    {
        if ($this->landGreenhouses->removeElement($landGreenhouse)) {
            // set the owning side to null (unless already changed)
            if ($landGreenhouse->getLand() === $this) {
                $landGreenhouse->setLand(null);
            }
        }

        return $this;
    }

    public function getAltitude(): ?int
    {
        return $this->altitude;
    }

    public function setAltitude(?int $altitude): static
    {
        $this->altitude = $altitude;

        return $this;
    }

    /**
     * @return Collection<int, LandProposal>
     */
    public function getLandProposals(): Collection
    {
        return $this->landProposals;
    }

    public function addLandProposal(LandProposal $landProposal): static
    {
        if (!$this->landProposals->contains($landProposal)) {
            $this->landProposals->add($landProposal);
            $landProposal->setLand($this);
        }

        return $this;
    }

    public function removeLandProposal(LandProposal $landProposal): static
    {
        if ($this->landProposals->removeElement($landProposal)) {
            // set the owning side to null (unless already changed)
            if ($landProposal->getLand() === $this) {
                $landProposal->setLand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LandDeal>
     */
    public function getLandDeals(): Collection
    {
        return $this->landDeals;
    }

    public function addLandDeal(LandDeal $landDeal): static
    {
        if (!$this->landDeals->contains($landDeal)) {
            $this->landDeals->add($landDeal);
            $landDeal->setLand($this);
        }

        return $this;
    }

    public function removeLandDeal(LandDeal $landDeal): static
    {
        if ($this->landDeals->removeElement($landDeal)) {
            // set the owning side to null (unless already changed)
            if ($landDeal->getLand() === $this) {
                $landDeal->setLand(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, LandApiKey>
     */
    public function getLandApiKeys(): Collection
    {
        return $this->landApiKeys;
    }

    public function addLandApiKey(LandApiKey $landApiKey): static
    {
        if (!$this->landApiKeys->contains($landApiKey)) {
            $this->landApiKeys->add($landApiKey);
            $landApiKey->setLand($this);
        }

        return $this;
    }

    public function removeLandApiKey(LandApiKey $landApiKey): static
    {
        if ($this->landApiKeys->removeElement($landApiKey)) {
            // set the owning side to null (unless already changed)
            if ($landApiKey->getLand() === $this) {
                $landApiKey->setLand(null);
            }
        }

        return $this;
    }
}
