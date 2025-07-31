<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use App\Security\Interface\PermissionHolder;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilZitadelBundle\Abstract\AbstractZitadelUser;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_AUTH_ID', fields: ['authId'])]
#[ORM\HasLifecycleCallbacks]
class Person extends AbstractZitadelUser implements PermissionHolder
{
    private array $permissions = [];

    /**
     * @var Collection<int, PersonApiKey>
     */
    #[ORM\OneToMany(targetEntity: PersonApiKey::class, mappedBy: 'person', orphanRemoval: true)]
    private Collection $personApiKeys;

    public function __construct()
    {
        $this->personApiKeys = new ArrayCollection();
    }

    #[Groups(["land_member:collection"])]
    public function getGivenName(): ?string
    {
        return parent::getGivenName();
    }

    #[Groups(["land_member:collection"])]
    public function getFamilyName(): ?string
    {
        return parent::getFamilyName();
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    public function setPermissions(?array $permissions): static
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * @return Collection<int, PersonApiKey>
     */
    public function getPersonApiKeys(): Collection
    {
        return $this->personApiKeys;
    }

    public function addPersonApiKey(PersonApiKey $personApiKey): static
    {
        if (!$this->personApiKeys->contains($personApiKey)) {
            $this->personApiKeys->add($personApiKey);
            $personApiKey->setPerson($this);
        }

        return $this;
    }

    public function removePersonApiKey(PersonApiKey $personApiKey): static
    {
        if ($this->personApiKeys->removeElement($personApiKey)) {
            // set the owning side to null (unless already changed)
            if ($personApiKey->getPerson() === $this) {
                $personApiKey->setPerson(null);
            }
        }

        return $this;
    }
}
