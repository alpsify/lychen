<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_AUTH_ID', fields: ['authId'])]
class Person implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $authId = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $givenName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $familyName = null;

    public function __construct()
    {
        $this->landMembers = new ArrayCollection();
        $this->landResearchRequests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthId(): ?string
    {
        return $this->authId;
    }

    public function setAuthId(string $authId): static
    {
        $this->authId = $authId;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->authId;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setGivenName(?string $givenName): static
    {
        $this->givenName = $givenName;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(?string $familyName): static
    {
        $this->familyName = $familyName;

        return $this;
    }
}
