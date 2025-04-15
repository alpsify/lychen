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
use App\Constant\GardeningLevel;
use App\Constant\LandInteractionMode;
use App\Constant\LandSharingCondition;
use App\Constant\Orientation;
use App\Constant\SoilType;
use App\Entity\Interface\StateLandInterface;
use App\Processor\WorkflowTransitionProcessor;
use App\Repository\LandProposalRepository;
use App\Security\Interface\LandAwareInterface;
use App\Security\Voter\LandProposalVoter;
use App\Validator\LandProposalOnlyOneStatePerLand;
use App\Workflow\LandProposal\LandProposalWorkflowPlace;
use App\Workflow\LandProposal\LandProposalWorkflowTransition;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandProposalRepository::class)]
#[ApiResource]
#[GetCollection(
    normalizationContext: ['groups' => ['user:land_proposal:collection']],
    security: "is_granted('" . LandProposalVoter::COLLECTION . "')",
    parameters: [
        'order[:property]' => new QueryParameter(
            filter: 'land_proposal.order_filter'
        ),
        new QueryParameter(
            key: 'state',
            schema: [
                'type' => 'string',
                'enum' => LandProposalWorkflowPlace::PLACES,
                'example' => LandProposalWorkflowPlace::ARCHIVED,
            ],
            openApi: new Parameter(
                name: 'state',
                in: 'query',
                description: 'Filter by state',
                required: false,
                allowEmptyValue: true
            ),
            filter: 'land_proposal.state_filter'),
    ]
)]
#[GetCollection(
    uriTemplate: '/land_proposals/public',
    normalizationContext: ['groups' => ['user:land_proposal:collection_public']],
    security: "is_granted('" . LandProposalVoter::COLLECTION_PUBLIC . "')",
    parameters: [
        'order[:property]' => new QueryParameter(
            filter: 'land_proposal.order_filter'
        ),
    ]
)]
#[Get(
    normalizationContext: ['groups' => ['user:land_proposal:get']],
    security: "is_granted('" . LandProposalVoter::GET . "', object)"
)]
#[Post(
    denormalizationContext: ['groups' => ['user:land_proposal:post']],
    securityPostDenormalize: "is_granted('" . LandProposalVoter::POST . "', object)"
)]
#[Patch(
    denormalizationContext: ['groups' => ['user:land_proposal:patch']],
    security: "is_granted('" . LandProposalVoter::PATCH . "', previous_object)"
)]
#[Patch(
    uriTemplate: '/land_proposals/{ulid}/' . LandProposalWorkflowTransition::PUBLISH,
    options: ['transition' => LandProposalWorkflowTransition::PUBLISH],
    normalizationContext: ['groups' => ['user:land_proposal:publish']],
    security: "is_granted('" . LandProposalVoter::PUBLISH . "', previous_object)",
    processor: WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate: '/land_proposals/{ulid}/' . LandProposalWorkflowTransition::ARCHIVE,
    options: ['transition' => LandProposalWorkflowTransition::ARCHIVE],
    normalizationContext: ['groups' => ['user:land_proposal:archive']],
    security: "is_granted('" . LandProposalVoter::ARCHIVE . "', previous_object)",
    processor: WorkflowTransitionProcessor::class)]
#[Delete(security: "is_granted('" . LandProposalVoter::DELETE . "', object)")]
#[ORM\HasLifecycleCallbacks]
#[LandProposalOnlyOneStatePerLand(states: [LandProposalWorkflowPlace::DRAFT, LandProposalWorkflowPlace::PUBLISHED])]
class LandProposal extends AbstractIdOrmAndUlidApiIdentified implements StateLandInterface, LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?string $title = null;

    /**
     * @var array|null Tiptap JSON Object
     */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?array $description = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: SoilType::ALL)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?string $soilType = null;

    #[ORM\Column(length: 20)]
    #[Assert\Choice(choices: Orientation::ALL)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?string $orientation = null;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?bool $hasParking = false;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?bool $hasTools = false;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?bool $hasShed = false;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?bool $hasWaterPoint = false;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?bool $hasIndependentAccess = false;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?string $gardenState = null; //TODO Create constante for that

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: LandInteractionMode::ALL)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?string $preferredGardenInteractionMode = LandInteractionMode::NO_PREFERENCE;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: GardeningLevel::ALL)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?string $gardeningLevel = GardeningLevel::BEGINNER;

    #[ORM\Column(length: 30)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    #[Assert\Choice(choices: GardeningLevel::ALL)]
    private ?string $lookingForGardenerLevel = null;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?int $gardenTotalSurface = null;

    #[ORM\Column]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
    private ?bool $foodSecurityParticipation = false;

    #[ORM\ManyToOne(inversedBy: 'landProposals')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_proposal:post"])]
    private ?Land $land = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(LandProposalWorkflowPlace::PLACES)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get"])]
    private ?string $state = LandProposalWorkflowPlace::DRAFT;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Assert\Choice(choices: LandSharingCondition::ALL, multiple: true)]
    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch"])]
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

    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch", "user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch", "user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land_proposal:collection", "user:land_proposal:get", "user:land_proposal:post", "user:land_proposal:patch", "user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getDescription(): ?array
    {
        return $this->description;
    }

    public function setDescription(?array $description): static
    {
        $this->description = $description;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getSoilType(): ?string
    {
        return $this->soilType;
    }

    public function setSoilType(string $soilType): static
    {
        $this->soilType = $soilType;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation): static
    {
        $this->orientation = $orientation;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getHasParking(): ?bool
    {
        return $this->hasParking;
    }

    public function setHasParking(bool $hasParking): static
    {
        $this->hasParking = $hasParking;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getHasTools(): ?bool
    {
        return $this->hasTools;
    }

    public function setHasTools(bool $hasTools): static
    {
        $this->hasTools = $hasTools;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getHasShed(): ?bool
    {
        return $this->hasShed;
    }

    public function setHasShed(bool $hasShed): static
    {
        $this->hasShed = $hasShed;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getHasWaterPoint(): ?bool
    {
        return $this->hasWaterPoint;
    }

    public function setHasWaterPoint(bool $hasWaterPoint): static
    {
        $this->hasWaterPoint = $hasWaterPoint;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getHasIndependentAccess(): ?bool
    {
        return $this->hasIndependentAccess;
    }

    public function setHasIndependentAccess(bool $hasIndependentAccess): static
    {
        $this->hasIndependentAccess = $hasIndependentAccess;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getGardenState(): ?string
    {
        return $this->gardenState;
    }

    public function setGardenState(string $gardenState): static
    {
        $this->gardenState = $gardenState;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getPreferredGardenInteractionMode(): ?string
    {
        return $this->preferredGardenInteractionMode;
    }

    public function setPreferredGardenInteractionMode(string $preferredGardenInteractionMode): static
    {
        $this->preferredGardenInteractionMode = $preferredGardenInteractionMode;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getGardeningLevel(): ?string
    {
        return $this->gardeningLevel;
    }

    public function setGardeningLevel(string $gardeningLevel): static
    {
        $this->gardeningLevel = $gardeningLevel;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getLookingForGardenerLevel(): ?string
    {
        return $this->lookingForGardenerLevel;
    }

    public function setLookingForGardenerLevel(string $lookingForGardenerLevel): static
    {
        $this->lookingForGardenerLevel = $lookingForGardenerLevel;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getGardenTotalSurface(): ?int
    {
        return $this->gardenTotalSurface;
    }

    public function setGardenTotalSurface(int $gardenTotalSurface): static
    {
        $this->gardenTotalSurface = $gardenTotalSurface;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getFoodSecurityParticipation(): ?bool
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

    #[Groups(["user:land_proposal:post", "user:land_proposal:patch", "user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getSharingConditions(): ?array
    {
        return $this->sharingConditions;
    }

    public function setSharingConditions(?array $sharingConditions): static
    {
        $this->sharingConditions = $sharingConditions;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
    public function getArchivedAt(): ?DateTimeImmutable
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?DateTimeImmutable $archivedAt): static
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    #[Groups(["user:land_proposal:publish", "user:land_proposal:archive"])]
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

