<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\LandMemberRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: LandMemberRepository::class)]
#[ApiResource(operations: [
    new Patch(),
    new GetCollection(),
    new Get(),
    new Post(),
    new Delete()
])]
#[ORM\HasLifecycleCallbacks]
class LandMember extends AbstractIdOrmAndUlidApiIdentified
{
    #[ORM\Column]
    private ?DateTimeImmutable $joinedAt = null;

    #[ORM\Column]
    private ?bool $owner = null;

    #[ORM\ManyToOne(inversedBy: 'landMembers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\ManyToOne(inversedBy: 'landMembers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\OneToOne(mappedBy: 'landMember', cascade: ['persist', 'remove'])]
    private ?LandMemberSetting $landMemberSetting = null;

    public function __construct(?Ulid $ulid = null)
    {
        parent::__construct($ulid);
        $this->setLandMemberSetting(new LandMemberSetting());
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
}
