<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Constant\GardeningLevel;
use App\Constant\LandInteractionMode;
use App\Constant\LandSharingCondition;
use App\Constant\Orientation;
use App\Constant\SoilType;
use App\Processor\WorkflowTransitionProcessor;
use App\Repository\LandProposalRepository;
use App\Workflow\LandProposal\LandProposalWorkflowPlace;
use App\Workflow\LandProposal\LandProposalWorkflowTransition;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandProposalRepository::class)]
#[ApiResource()]
#[Get()]
#[GetCollection()]
#[Post(denormalizationContext: ['groups' => ['user:land_proposal:post']],)]
#[Patch(denormalizationContext: ['groups' => ['user:land_proposal:patch']],)]
#[Patch(
    uriTemplate: '/land_proposals/{ulid}/' . LandProposalWorkflowTransition::PUBLISH,
    options: ['transition' => LandProposalWorkflowTransition::PUBLISH],
    denormalizationContext: ['groups' => ['user:land_proposal:publish']],
    //security: "true",
    name: 'publish',
    processor: WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate: '/land_proposals/{ulid}/' . LandProposalWorkflowTransition::ARCHIVE,
    options: ['transition' => LandProposalWorkflowTransition::ARCHIVE],
    denormalizationContext: ['groups' => ['user:land_proposal:archive']],
    //security: "true",
    name: 'archive',
    processor: WorkflowTransitionProcessor::class)]
#[Delete(security: "object.getState() === " . LandProposalWorkflowPlace::DRAFT)]
#[ORM\HasLifecycleCallbacks]
class LandProposal extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    /**
     * @var array|null Tiptap JSON Object
     */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $description = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: SoilType::ALL)]
    private ?string $soilType = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: Orientation::ALL)]
    private ?string $orientation = null;

    #[ORM\Column]
    private ?bool $hasParking = false;

    #[ORM\Column]
    private ?bool $hasTools = false;

    #[ORM\Column]
    private ?bool $hasShed = false;

    #[ORM\Column]
    private ?bool $hasWaterPoint = false;

    #[ORM\Column]
    private ?bool $hasIndependentAccess = false;

    #[ORM\Column(length: 255)]
    private ?string $gardenState = null; //TODO Create constante for that

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: LandInteractionMode::ALL)]
    private ?string $preferredGardenInteractionMode = LandInteractionMode::NO_PREFERENCE;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: GardeningLevel::ALL)]
    private ?string $gardeningLevel = GardeningLevel::BEGINNER;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: GardeningLevel::ALL)]
    private ?string $lookingForGardenerLevel = null;

    #[ORM\Column]
    private ?int $gardenTotalSurface = null;

    #[ORM\Column]
    private ?bool $foodSecurityParticipation = false;

    #[ORM\ManyToOne(inversedBy: 'landProposals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(LandProposalWorkflowPlace::PLACES)]
    private ?string $state = LandProposalWorkflowPlace::DRAFT;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Assert\Choice(choices: LandSharingCondition::ALL, multiple: true)]
    private ?array $sharingConditions = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get"])]
    private ?DateTimeImmutable $publishedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get"])]
    private ?DateTimeImmutable $archivedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get"])]
    private ?DateTimeImmutable $expirationDate = null;

    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?array
    {
        return $this->description;
    }

    public function setDescription(?array $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSoilType(): ?string
    {
        return $this->soilType;
    }

    public function setSoilType(string $soilType): static
    {
        $this->soilType = $soilType;

        return $this;
    }

    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation): static
    {
        $this->orientation = $orientation;

        return $this;
    }

    public function getHasParking(): ?bool
    {
        return $this->hasParking;
    }

    public function setHasParking(bool $hasParking): static
    {
        $this->hasParking = $hasParking;

        return $this;
    }

    public function getHasTools(): ?bool
    {
        return $this->hasTools;
    }

    public function setHasTools(bool $hasTools): static
    {
        $this->hasTools = $hasTools;

        return $this;
    }

    public function getHasShed(): ?bool
    {
        return $this->hasShed;
    }

    public function setHasShed(bool $hasShed): static
    {
        $this->hasShed = $hasShed;

        return $this;
    }

    public function getHasWaterPoint(): ?bool
    {
        return $this->hasWaterPoint;
    }

    public function setHasWaterPoint(bool $hasWaterPoint): static
    {
        $this->hasWaterPoint = $hasWaterPoint;

        return $this;
    }

    public function getHasIndependentAccess(): ?bool
    {
        return $this->hasIndependentAccess;
    }

    public function setHasIndependentAccess(bool $hasIndependentAccess): static
    {
        $this->hasIndependentAccess = $hasIndependentAccess;

        return $this;
    }

    public function getGardenState(): ?string
    {
        return $this->gardenState;
    }

    public function setGardenState(string $gardenState): static
    {
        $this->gardenState = $gardenState;

        return $this;
    }

    public function getPreferredGardenInteractionMode(): ?string
    {
        return $this->preferredGardenInteractionMode;
    }

    public function setPreferredGardenInteractionMode(string $preferredGardenInteractionMode): static
    {
        $this->preferredGardenInteractionMode = $preferredGardenInteractionMode;

        return $this;
    }

    public function getGardeningLevel(): ?string
    {
        return $this->gardeningLevel;
    }

    public function setGardeningLevel(string $gardeningLevel): static
    {
        $this->gardeningLevel = $gardeningLevel;

        return $this;
    }

    public function getLookingForGardenerLevel(): ?string
    {
        return $this->lookingForGardenerLevel;
    }

    public function setLookingForGardenerLevel(string $lookingForGardenerLevel): static
    {
        $this->lookingForGardenerLevel = $lookingForGardenerLevel;

        return $this;
    }

    public function getGardenTotalSurface(): ?int
    {
        return $this->gardenTotalSurface;
    }

    public function setGardenTotalSurface(int $gardenTotalSurface): static
    {
        $this->gardenTotalSurface = $gardenTotalSurface;

        return $this;
    }

    public function isFoodSecurityParticipation(): ?bool
    {
        return $this->foodSecurityParticipation;
    }

    public function setFoodSecurityParticipation(bool $foodSecurityParticipation): static
    {
        $this->foodSecurityParticipation = $foodSecurityParticipation;

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

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getSharingConditions(): ?array
    {
        return $this->sharingConditions;
    }

    public function setSharingConditions(?array $sharingConditions): static
    {
        $this->sharingConditions = $sharingConditions;

        return $this;
    }

    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getArchivedAt(): ?DateTimeImmutable
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?DateTimeImmutable $archivedAt): static
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    public function getExpirationDate(): ?DateTimeImmutable
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?DateTimeImmutable $expirationDate): static
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }
}

