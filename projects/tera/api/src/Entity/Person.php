<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilZitadelBundle\Abstract\AbstractZitadelUser;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_AUTH_ID', fields: ['authId'])]
#[ORM\HasLifecycleCallbacks]
class Person extends AbstractZitadelUser
{
    /**
     * @var Collection<int, LandMember>
     */
    #[ORM\OneToMany(targetEntity: LandMember::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $landMembers;

    /**
     * @var Collection<int, LandRequest>
     */
    #[ORM\OneToMany(targetEntity: LandRequest::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $landRequests;

    /**
     * @var Collection<int, PlantCustom>
     */
    #[ORM\OneToMany(targetEntity: PlantCustom::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $plantCustoms;

    /**
     * @var Collection<int, SeedStock>
     */
    #[ORM\OneToMany(targetEntity: SeedStock::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $seedStocks;

    /**
     * @var Collection<int, LandMemberInvitation>
     */
    #[ORM\OneToMany(targetEntity: LandMemberInvitation::class, mappedBy: 'person')]
    private Collection $landMemberInvitations;

    public function __construct()
    {
        $this->landMembers = new ArrayCollection();
        $this->landRequests = new ArrayCollection();
        $this->plantCustoms = new ArrayCollection();
        $this->seedStocks = new ArrayCollection();
        $this->landMemberInvitations = new ArrayCollection();
    }

    #[Groups(["user:land_member:collection"])]
    public function getGivenName(): ?string
    {
        return parent::getGivenName();
    }

    #[Groups(["user:land_member:collection"])]
    public function getFamilyName(): ?string
    {
        return parent::getFamilyName();
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
            $landMember->setPerson($this);
        }

        return $this;
    }

    public function removeLandMember(LandMember $landMember): static
    {
        if ($this->landMembers->removeElement($landMember)) {
            // set the owning side to null (unless already changed)
            if ($landMember->getPerson() === $this) {
                $landMember->setPerson(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LandRequest>
     */
    public function getLandRequests(): Collection
    {
        return $this->landRequests;
    }

    public function addLandRequest(LandRequest $landRequest): static
    {
        if (!$this->landRequests->contains($landRequest)) {
            $this->landRequests->add($landRequest);
            $landRequest->setPerson($this);
        }

        return $this;
    }

    public function removeLandRequest(LandRequest $landRequest): static
    {
        if ($this->landRequests->removeElement($landRequest)) {
            // set the owning side to null (unless already changed)
            if ($landRequest->getPerson() === $this) {
                $landRequest->setPerson(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlantCustom>
     */
    public function getPlantCustoms(): Collection
    {
        return $this->plantCustoms;
    }

    public function addPlantCustom(PlantCustom $plantCustom): static
    {
        if (!$this->plantCustoms->contains($plantCustom)) {
            $this->plantCustoms->add($plantCustom);
            $plantCustom->setPerson($this);
        }

        return $this;
    }

    public function removePlantCustom(PlantCustom $plantCustom): static
    {
        if ($this->plantCustoms->removeElement($plantCustom)) {
            // set the owning side to null (unless already changed)
            if ($plantCustom->getPerson() === $this) {
                $plantCustom->setPerson(null);
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
            $seedStock->setPerson($this);
        }

        return $this;
    }

    public function removeSeedStock(SeedStock $seedStock): static
    {
        if ($this->seedStocks->removeElement($seedStock)) {
            // set the owning side to null (unless already changed)
            if ($seedStock->getPerson() === $this) {
                $seedStock->setPerson(null);
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
            $landMemberInvitation->setPerson($this);
        }

        return $this;
    }

    public function removeLandMemberInvitation(LandMemberInvitation $landMemberInvitation): static
    {
        if ($this->landMemberInvitations->removeElement($landMemberInvitation)) {
            // set the owning side to null (unless already changed)
            if ($landMemberInvitation->getPerson() === $this) {
                $landMemberInvitation->setPerson(null);
            }
        }

        return $this;
    }


}
