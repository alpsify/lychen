<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\QueryParameter;
use ApiPlatform\OpenApi\Model\Parameter;
use App\Doctrine\Filter\LandFilter;
use App\Provider\LandMembersMeProvider;
use App\Repository\LandMemberRepository;
use App\Security\Constant\LandMemberPermission;
use App\Security\Interface\LandAwareInterface;
use App\Validator\LandRolesBelongToLand;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandMemberRepository::class)]
#[ApiResource()]
#[Patch(
    denormalizationContext: ['groups' => ['user:land_member:patch']],
    security: "is_granted('" . LandMemberPermission::UPDATE . "', object)")
]
#[Delete(security: "(is_granted('" . LandMemberPermission::DELETE . "', object) or object.getPerson() == user) and !object.isOwner()")]
#[Get(
    uriTemplate: '/land_members/{ulid}',
    requirements: ['ulid' => '[0-9A-HJKMNP-TV-Z]{26}'],
    normalizationContext: ['groups' => ['user:land_member:get']],
    security: "is_granted('" . LandMemberPermission::READ . "', object) or object.getPerson() == user"
)]
#[GetCollection(
    normalizationContext: ['groups' => ['user:land_member:collection']],
    security: "is_granted('" . LandMemberPermission::READ . "')",
    parameters: [
        new QueryParameter(
            key: 'land',
            schema: ['type' => 'string'],
            openApi: new Parameter(
                name: 'land',
                in: 'query',
                description: 'Filter by land',
                required: true,
                allowEmptyValue: false
            ),
            filter: LandFilter::class,
            required: true
        ),
    ])]
#[Get(uriTemplate: '/land_members/me', normalizationContext: ['groups' => ['user:land_member:get-me']], priority: 10, name: 'get-me', provider: LandMembersMeProvider::class, parameters: [
    new QueryParameter(
        key: 'land',
        schema: ['type' => 'string'],
        openApi: new Parameter(
            name: 'land',
            in: 'query',
            description: 'Filter by land',
            required: true,
            allowEmptyValue: false
        ),
        filter: LandFilter::class,
        required: true
    ),
])]
#[ORM\HasLifecycleCallbacks]
#[LandRolesBelongToLand]
class LandMember extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    #[ORM\Column]
    #[Groups(["user:land_member:collection", "user:land_member:get"])]
    private ?DateTimeImmutable $joinedAt = null;

    #[ORM\Column]
    #[Groups(["user:land_member:collection", "user:land_member:get", "user:land_member:get-me"])]
    private ?bool $owner = false;

    #[ORM\ManyToOne(inversedBy: 'landMembers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_member:get-me"])]
    private ?Land $land = null;

    #[ORM\ManyToOne(inversedBy: 'landMembers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_member:collection", "user:land_member:get"])]
    private ?Person $person = null;

    #[ORM\OneToOne(mappedBy: 'landMember', cascade: ['persist', 'remove'])]
    #[Groups(["user:land_member:collection", "user:land_member:get"])]
    private ?LandMemberSetting $landMemberSetting = null;

    /**
     * @var Collection<int, LandRole>
     */
    #[ORM\ManyToMany(targetEntity: LandRole::class, inversedBy: 'landMembers')]
    #[Groups(["user:land_member:collection", "user:land_member:get", "user:land_member:patch", "user:land_member:get-me"])]
    #[Assert\Valid()]
    private Collection $landRoles;

    public function __construct(?Ulid $ulid = null)
    {
        parent::__construct($ulid);
        $this->setLandMemberSetting(new LandMemberSetting());
        $this->landRoles = new ArrayCollection();
    }

    #[Groups(["user:land_member:collection", "user:land_member:get", "user:land_member:patch", "user:land_member:get-me"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    public function getJoinedAt(): ?DateTimeImmutable
    {
        return $this->joinedAt;
    }

    public function setJoinedAt(DateTimeImmutable $joinedAt): static
    {
        $this->joinedAt = $joinedAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function setJoinedAtValue(): void
    {
        $this->joinedAt = new DateTimeImmutable();
    }

    public function isOwner(): ?bool
    {
        return $this->owner;
    }

    public function setOwner(bool $owner): static
    {
        $this->owner = $owner;

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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getLandMemberSetting(): ?LandMemberSetting
    {
        return $this->landMemberSetting;
    }

    public function setLandMemberSetting(LandMemberSetting $landMemberSetting): static
    {
        // set the owning side of the relation if necessary
        if ($landMemberSetting->getLandMember() !== $this) {
            $landMemberSetting->setLandMember($this);
        }

        $this->landMemberSetting = $landMemberSetting;

        return $this;
    }

    /**
     * @return Collection<int, LandRole>
     */
    public function getLandRoles(): Collection
    {
        return $this->landRoles;
    }

    public function setLandRoles(Collection $landRoles): static
    {
        foreach ($landRoles as $landRole) {
            $this->addLandRole($landRole);
        }

        return $this;
    }

    public function addLandRole(LandRole $landRole): static
    {
        if (!$this->landRoles->contains($landRole)) {
            $this->landRoles->add($landRole);
        }

        return $this;
    }

    public function removeLandRole(LandRole $landRole): static
    {
        $this->landRoles->removeElement($landRole);

        return $this;
    }
}
