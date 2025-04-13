<?php

namespace App\Entity;

use App\Repository\LandApiKeyRepository;
use App\Security\Interface\PermissionHolder;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: LandApiKeyRepository::class)]
#[ORM\HasLifecycleCallbacks]
class LandApiKey extends AbstractIdOrmAndUlidApiIdentified implements PermissionHolder, UserInterface
{
    use CreatedAtTrait;

    public const string PREFIX = 'tera-land_';

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    private array $permissions = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $lastUsedDate = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'landApiKeys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    public function setPermissions(?array $permissions): static
    {
        $this->permissions = $permissions;

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

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(?Land $land): static
    {
        $this->land = $land;

        return $this;
    }
}
