<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\QueryParameter;
use ApiPlatform\OpenApi\Model\Operation;
use ApiPlatform\OpenApi\Model\Parameter;
use ApiPlatform\OpenApi\Model\RequestBody;
use App\Doctrine\Filter\LandFilter;
use App\Repository\LandRoleRepository;
use App\Security\Constant\LandAreaPermission;
use App\Security\Constant\LandGreenhousePermission;
use App\Security\Constant\LandRolePermission;
use App\Security\Constant\Permissions;
use App\Security\Interface\LandAwareInterface;
use ArrayObject;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\PositionTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandRoleRepository::class)]
#[ApiResource]
#[Post(openapi: new Operation(
    summary: 'Create a land',
    requestBody: new RequestBody(
        content: new ArrayObject([
            'application/ld+json' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => [
                        'name' => ['type' => 'string'],
                        'permissions' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                                'enum' => Permissions::LAND_MEMBER_RELATED,
                            ]
                        ],
                        'land' => ['type' => 'string'],
                    ],
                    'required' => ['name', 'land', 'permissions']
                ],
                'example' => [
                    'name' => 'Wonderful garden',
                    'permissions' => [...LandAreaPermission::ALL],
                    'land' => '/api/land/{ulid}'
                ]
            ]
        ])
    )
), securityPostDenormalize: "is_granted('" . LandRolePermission::CREATE . "', object)")]
#[Patch(openapi: new Operation(
    summary: 'Update a land role',
    requestBody: new RequestBody(
        content: new ArrayObject([
            'application/merge-patch+json' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => [
                        'name' => ['type' => 'string'],
                        'permissions' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'string',
                                'enum' => Permissions::LAND_MEMBER_RELATED,
                            ]
                        ],
                    ],
                ],
                'example' => [
                    'name' => 'Wonderful garden',
                    'permissions' => [...LandGreenhousePermission::ALL]
                ]
            ]
        ])
    )
), security: "is_granted('" . LandRolePermission::UPDATE . "', object)")]
#[Delete(security: "is_granted('" . LandRolePermission::DELETE . "', object)")]
#[Get(security: "is_granted('" . LandRolePermission::READ . "', object)")]
#[GetCollection(security: "is_granted('" . LandRolePermission::READ . "')", parameters: [
    new QueryParameter(key: 'land', schema: ['type' => 'string'], openApi: new Parameter(name: 'land', in: 'query', description: 'Filter by land', required: true, allowEmptyValue: false), filter: LandFilter::class, required: true),
    'order[:property]' => new QueryParameter(filter: 'land_role.order_filter'),
])]
#[ORM\HasLifecycleCallbacks]
class LandRole extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use PositionTrait;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_role:collection", "user:land_role:get", "user:land_role:patch", "user:land_role:post"])]
    #[Assert\NotBlank()]
    private ?string $name = null;

    #[Gedmo\SortableGroup()]
    #[ORM\ManyToOne(inversedBy: 'landRoles')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_role:get", "user:land_role:post"])]
    private ?Land $land = null;

    /**
     * @var Collection<int, LandMember>
     */
    #[ORM\ManyToMany(targetEntity: LandMember::class, mappedBy: 'landRoles')]
    #[Groups(["user:land_role:collection", "user:land_role:get"])]
    private Collection $landMembers;

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(Permissions::ALL, multiple: true)]
    #[Groups(["user:land_role:collection", "user:land_role:get", "user:land_role:patch", "user:land_role:post"])]
    private ?array $permissions = null;

    public function __construct()
    {
        parent::__construct();
        $this->landMembers = new ArrayCollection();
    }

    #[Groups(["user:land_role:collection", "user:land_role:get", "user:land_role:patch", "user:land_role:post"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_role:get", "user:land_role:patch"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land_role:get", "user:land_role:patch"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
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
            $landMember->addLandRole($this);
        }

        return $this;
    }

    public function removeLandMember(LandMember $landMember): static
    {
        if ($this->landMembers->removeElement($landMember)) {
            $landMember->removeLandRole($this);
        }

        return $this;
    }

    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    public function setPermissions(?array $permissions): static
    {
        $this->permissions = $permissions;

        return $this;
    }

    #[Groups(["user:land_role:collection", "user:land_role:get"])]
    public function getPosition(): int
    {
        return $this->position;
    }
}
