<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilZitadelBundle\Abstract\AbstractZitadelUser;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_AUTH_ID', fields: ['authId'])]
class Person extends AbstractZitadelUser
{
    /**
     * @var Collection<int, LandMember>
     */
    #[ORM\OneToMany(targetEntity: LandMember::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $landMembers;

    /**
     * @var Collection<int, LandResearchRequest>
     */
    #[ORM\OneToMany(targetEntity: LandResearchRequest::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $landResearchRequests;

    public function __construct()
    {
        $this->landMembers = new ArrayCollection();
        $this->landResearchRequests = new ArrayCollection();
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
     * @return Collection<int, LandResearchRequest>
     */
    public function getLandResearchRequests(): Collection
    {
        return $this->landResearchRequests;
    }

    public function addLandResearchRequest(LandResearchRequest $landResearchRequest): static
    {
        if (!$this->landResearchRequests->contains($landResearchRequest)) {
            $this->landResearchRequests->add($landResearchRequest);
            $landResearchRequest->setPerson($this);
        }

        return $this;
    }

    public function removeLandResearchRequest(LandResearchRequest $landResearchRequest): static
    {
        if ($this->landResearchRequests->removeElement($landResearchRequest)) {
            // set the owning side to null (unless already changed)
            if ($landResearchRequest->getPerson() === $this) {
                $landResearchRequest->setPerson(null);
            }
        }

        return $this;
    }


}
