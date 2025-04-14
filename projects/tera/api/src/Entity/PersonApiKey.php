<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\PersonApiKeyRepository;
use App\Security\Constant\PersonPermission;
use App\Security\Interface\PermissionHolder;
use App\Security\Voter\LandApiKeyVoter;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PersonApiKeyRepository::class)]
#[ApiResource]
#[Post(denormalizationContext: ['groups' => ['user:person_api_key:post']], securityPostDenormalize: "is_granted('" . LandApiKeyVoter::POST . "', object)")]
#[Delete(security: "is_granted('" . LandApiKeyVoter::DELETE . "', object)")]
#[Get(normalizationContext: ['groups' => ['user:person_api_key:get']], security: "is_granted('" . LandApiKeyVoter::GET . "', object)")]
#[GetCollection(normalizationContext: ['groups' => ['user:person_api_key:collection']], security: "is_granted('" . LandApiKeyVoter::COLLECTION . "')")]
#[ORM\HasLifecycleCallbacks]
class PersonApiKey extends AbstractIdOrmAndUlidApiIdentified implements PermissionHolder, UserInterface
{
    use CreatedAtTrait;

    public const string PREFIX = 'tera-person_';

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(PersonPermission::ALL, multiple: true)]
    private array $permissions = [];

    #[ORM\ManyToOne(inversedBy: 'personApiKeys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $lastUsedDate = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    public function setPermissions(?array $permissions): static
    {
        $this->permissions = $permissions;

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

    public function getRoles(): array
    {
        return [];
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {

        return $this->ulid;
    }

    public function getLastUsedDate(): ?DateTimeInterface
    {
        return $this->lastUsedDate;
    }

    public function setLastUsedDate(?DateTimeInterface $lastUsedDate): static
    {
        $this->lastUsedDate = $lastUsedDate;

        return $this;
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
}
