<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\QueryParameter;
use ApiPlatform\OpenApi\Model\Parameter;
use App\Doctrine\Filter\LandFilter;
use App\Repository\LandApiKeyRepository;
use App\Security\Constant\LandMemberPermission;
use App\Security\Interface\PermissionHolder;
use App\Security\Voter\LandApiKeyVoter;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandApiKeyRepository::class)]
#[ApiResource]
#[Post(denormalizationContext: ['groups' => ['user:land_api_key:post']], securityPostDenormalize: "is_granted('" . LandApiKeyVoter::POST . "', object)")]
#[Delete(security: "is_granted('" . LandApiKeyVoter::DELETE . "', object)")]
#[Get(normalizationContext: ['groups' => ['user:land_api_key:get']], security: "is_granted('" . LandApiKeyVoter::GET . "', object)")]
#[GetCollection(normalizationContext: ['groups' => ['user:land_api_key:collection']], security: "is_granted('" . LandApiKeyVoter::COLLECTION . "')", parameters: [
    new QueryParameter(key: 'land', schema: ['type' => 'string'], openApi: new Parameter(name: 'land', in: 'query',
        description: 'Filter by land', required: true, allowEmptyValue: false), filter: LandFilter::class,
        required: true),
])]
#[ORM\HasLifecycleCallbacks]
class LandApiKey extends AbstractIdOrmAndUlidApiIdentified implements PermissionHolder, UserInterface
{
    use CreatedAtTrait;

    public const string PREFIX = 'tera-land_';

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(LandMemberPermission::ALL, multiple: true)]
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

    public function getApiKeys(): array
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

    public function getRoles(): array
    {
        return [];
    }
}
