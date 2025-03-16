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
use App\Constant\LandAreaKind;
use App\Doctrine\Filter\LandFilter;
use App\Repository\LandAreaRepository;
use App\Security\Constant\LandAreaPermission;
use App\Security\Interface\LandAwareInterface;
use App\Workflow\LandArea\LandAreaWorkflowPlace;
use ArrayObject;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandAreaRepository::class)]
#[ApiResource()]
#[Post(openapi: new Operation(
    summary: 'Create a land area',
    requestBody: new RequestBody(
        content: new ArrayObject([
            'application/ld+json' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => [
                        'name' => ['type' => 'string'],
                        'description' => ['type' => 'string'],
                        'land' => ['type' => 'string'],
                    ],
                    'required' => ['name', 'land']
                ],
                'example' => [
                    'name' => 'Table 1',
                    'description' => 'An amazing growing table',
                    'land' => '/api/land/{ulid}'
                ]
            ]
        ])
    )
), securityPostDenormalize: "is_granted('" . LandAreaPermission::CREATE . "', object)",)]
#[Patch(security: "is_granted('" . LandAreaPermission::UPDATE . "', object)")]
#[Delete(security: "is_granted('" . LandAreaPermission::DELETE . "', object)")]
#[Get(security: "is_granted('" . LandAreaPermission::READ . "', object)")]
#[GetCollection(security: "is_granted('" . LandAreaPermission::READ . "')", parameters: [
    new QueryParameter(key: 'land', schema: ['type' => 'string'], openApi: new Parameter(name: 'land', in: 'query', description: 'Filter by land', required: true, allowEmptyValue: false), filter: LandFilter::class, required: true)
])]
#[ORM\HasLifecycleCallbacks]
class LandArea extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_area:collection", "user:land_area:get", "user:land_area:patch", "user:land_area:post"])]
    #[Assert\NotBlank()]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'landAreas')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_area:get", "user:land_area:post"])]
    private ?Land $land = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(["user:land_area:collection", "user:land_area:get", "user:land_area:patch", "user:land_area:post"])]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'landArea', cascade: ['persist', 'remove'])]
    #[Groups(["user:land_area:collection", "user:land_area:get"])]
    private ?LandAreaSetting $landAreaSetting = null;

    #[ORM\OneToOne(mappedBy: 'landArea', cascade: ['persist', 'remove'])]
    #[Groups(["user:land_area:collection", "user:land_area:get"])]
    private ?LandAreaParameter $landAreaParameter = null;

    #[ORM\ManyToOne(inversedBy: 'landAreas')]
    #[Groups(["user:land_area:collection", "user:land_area:get"])]
    private ?LandGreenhouse $landGreenhouse = null;

    /**
     * @var Collection<int, LandTask>
     */
    #[ORM\OneToMany(targetEntity: LandTask::class, mappedBy: 'landArea')]
    #[Groups(["user:land_area:collection", "user:land_area:get"])]
    private Collection $landTasks;

    #[Assert\Choice(LandAreaWorkflowPlace::PLACES)]
    #[ORM\Column(length: 255)]
    #[Groups(["user:land_area:collection", "user:land_area:get", "user:land_area:patch", "user:land_area:post"])]
    #[Assert\NotBlank()]
    private ?string $state = LandAreaWorkflowPlace::ACTIVE;

    /**
     * @var Collection<int, LandCultivationPlan>
     */
    #[ORM\OneToMany(targetEntity: LandCultivationPlan::class, mappedBy: 'landArea')]
    #[Groups(["user:land_area:collection", "user:land_area:get"])]
    private Collection $landCultivationPlans;

    #[ORM\Column(length: 150, options: ['default' => LandAreaKind::OPEN_SOIL])]
    #[Assert\Choice(LandAreaKind::ALL)]
    #[Groups(["user:land_area:collection", "user:land_area:get", "user:land_area:patch", "user:land_area:post"])]
    private ?string $kind = LandAreaKind::OPEN_SOIL;

    public function __construct(?Ulid $ulid = null)
    {
        parent::__construct($ulid);
        $this->setLandAreaSetting(new LandAreaSetting());
        $this->setLandAreaParameter(new LandAreaParameter());
        $this->landTasks = new ArrayCollection();
        $this->landCultivationPlans = new ArrayCollection();
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

    #[Groups(["user:land_area:collection", "user:land_area:get", "user:land_area:patch", "user:land_area:post"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_area:get", "user:land_area:patch"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land_area:get", "user:land_area:patch"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLandAreaSetting(): ?LandAreaSetting
    {
        return $this->landAreaSetting;
    }

    public function setLandAreaSetting(LandAreaSetting $landAreaSetting): static
    {
        // set the owning side of the relation if necessary
        if ($landAreaSetting->getLandArea() !== $this) {
            $landAreaSetting->setLandArea($this);
        }

        $this->landAreaSetting = $landAreaSetting;

        return $this;
    }

    public function getLandAreaParameter(): ?LandAreaParameter
    {
        return $this->landAreaParameter;
    }

    public function setLandAreaParameter(LandAreaParameter $landAreaParameter): static
    {
        // set the owning side of the relation if necessary
        if ($landAreaParameter->getLandArea() !== $this) {
            $landAreaParameter->setLandArea($this);
        }

        $this->landAreaParameter = $landAreaParameter;

        return $this;
    }

    public function getLandGreenhouse(): ?LandGreenhouse
    {
        return $this->landGreenhouse;
    }

    public function setLandGreenhouse(?LandGreenhouse $landGreenhouse): static
    {
        $this->landGreenhouse = $landGreenhouse;

        return $this;
    }

    /**
     * @return Collection<int, LandTask>
     */
    public function getLandTasks(): Collection
    {
        return $this->landTasks;
    }

    public function addLandTask(LandTask $landTask): static
    {
        if (!$this->landTasks->contains($landTask)) {
            $this->landTasks->add($landTask);
            $landTask->setLandArea($this);
        }

        return $this;
    }

    public function removeLandTask(LandTask $landTask): static
    {
        if ($this->landTasks->removeElement($landTask)) {
            // set the owning side to null (unless already changed)
            if ($landTask->getLandArea() === $this) {
                $landTask->setLandArea(null);
            }
        }

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection<int, LandCultivationPlan>
     */
    public function getLandCultivationPlans(): Collection
    {
        return $this->landCultivationPlans;
    }

    public function addLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if (!$this->landCultivationPlans->contains($landCultivationPlan)) {
            $this->landCultivationPlans->add($landCultivationPlan);
            $landCultivationPlan->setLandArea($this);
        }

        return $this;
    }

    public function removeLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if ($this->landCultivationPlans->removeElement($landCultivationPlan)) {
            // set the owning side to null (unless already changed)
            if ($landCultivationPlan->getLandArea() === $this) {
                $landCultivationPlan->setLandArea(null);
            }
        }

        return $this;
    }

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }
}
