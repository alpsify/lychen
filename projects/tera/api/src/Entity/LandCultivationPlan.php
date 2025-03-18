<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\QueryParameter;
use ApiPlatform\OpenApi\Model\Parameter;
use App\Doctrine\Filter\LandFilter;
use App\Repository\LandCultivationPlanRepository;
use App\Security\Constant\LandCultivationPlanPermission;
use App\Security\Interface\LandAwareInterface;
use App\Workflow\LandCultivationPlan\LandCultivationPlanWorkflowPlace;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: LandCultivationPlanRepository::class)]
#[ApiResource]
#[Post(securityPostDenormalize: "is_granted('" . LandCultivationPlanPermission::CREATE . "', object)")]
#[Patch(security: "is_granted('" . LandCultivationPlanPermission::UPDATE . "', object)")]
#[Delete(security: "is_granted('" . LandCultivationPlanPermission::DELETE . "', object)")]
#[Get(security: "is_granted('" . LandCultivationPlanPermission::READ . "', object)")]
#[GetCollection(security: "is_granted('" . LandCultivationPlanPermission::READ . "')", parameters: [
    new QueryParameter(key: 'land', schema: ['type' => 'string'], openApi: new Parameter(name: 'land', in: 'query', description: 'Filter by land', required: true, allowEmptyValue: false), filter: LandFilter::class, required: true)
])]
#[ORM\HasLifecycleCallbacks]
class LandCultivationPlan extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $endDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $expectedSowingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $sowingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $expectedPlantingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $plantingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $expectedHarvestingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $harvestingDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?DateTimeInterface $forecastedEndDate = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get"])]
    private ?string $state = LandCultivationPlanWorkflowPlace::DRAFT;

    #[ORM\ManyToOne(inversedBy: 'landCultivationPlans')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?Plant $plant = null;

    #[ORM\ManyToOne(inversedBy: 'landCultivationPlans')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_cultivation_plan:get", "user:land_cultivation_plan:post"])]
    private ?Land $land = null;

    #[ORM\ManyToOne(inversedBy: 'landCultivationPlans')]
    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    private ?LandArea $landArea = null;

    #[Groups(["user:land_cultivation_plan:collection", "user:land_cultivation_plan:get", "user:land_cultivation_plan:patch", "user:land_cultivation_plan:post"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_cultivation_plan:get", "user:land_cultivation_plan:patch"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land_cultivation_plan:get", "user:land_cultivation_plan:patch"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getExpectedSowingDate(): ?DateTimeInterface
    {
        return $this->expectedSowingDate;
    }

    public function setExpectedSowingDate(?DateTimeInterface $expectedSowingDate): static
    {
        $this->expectedSowingDate = $expectedSowingDate;

        return $this;
    }

    public function getSowingDate(): ?DateTimeInterface
    {
        return $this->sowingDate;
    }

    public function setSowingDate(?DateTimeInterface $sowingDate): static
    {
        $this->sowingDate = $sowingDate;

        return $this;
    }

    public function getExpectedPlantingDate(): ?DateTimeInterface
    {
        return $this->expectedPlantingDate;
    }

    public function setExpectedPlantingDate(?DateTimeInterface $expectedPlantingDate): static
    {
        $this->expectedPlantingDate = $expectedPlantingDate;

        return $this;
    }

    public function getPlantingDate(): ?DateTimeInterface
    {
        return $this->plantingDate;
    }

    public function setPlantingDate(?DateTimeInterface $plantingDate): static
    {
        $this->plantingDate = $plantingDate;

        return $this;
    }

    public function getExpectedHarvestingDate(): ?DateTimeInterface
    {
        return $this->expectedHarvestingDate;
    }

    public function setExpectedHarvestingDate(?DateTimeInterface $expectedHarvestingDate): static
    {
        $this->expectedHarvestingDate = $expectedHarvestingDate;

        return $this;
    }

    public function getHarvestingDate(): ?DateTimeInterface
    {
        return $this->harvestingDate;
    }

    public function setHarvestingDate(?DateTimeInterface $harvestingDate): static
    {
        $this->harvestingDate = $harvestingDate;

        return $this;
    }

    public function getForecastedEndDate(): ?DateTimeInterface
    {
        return $this->forecastedEndDate;
    }

    public function setForecastedEndDate(?DateTimeInterface $forecastedEndDate): static
    {
        $this->forecastedEndDate = $forecastedEndDate;

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

    public function getPlant(): ?Plant
    {
        return $this->plant;
    }

    public function setPlant(?Plant $plant): static
    {
        $this->plant = $plant;

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

    public function getLandArea(): ?LandArea
    {
        return $this->landArea;
    }

    public function setLandArea(?LandArea $landArea): static
    {
        $this->landArea = $landArea;

        return $this;
    }
}
