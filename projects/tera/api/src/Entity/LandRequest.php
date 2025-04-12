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
use App\Entity\Interface\StatePersonInterface;
use App\Processor\WorkflowTransitionProcessor;
use App\Repository\LandRequestRepository;
use App\Validator\UniqueStatePerPerson;
use App\Workflow\LandRequest\LandRequestWorkflowPlace;
use App\Workflow\LandRequest\LandRequestWorkflowTransition;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandRequestRepository::class)]
#[ApiResource()]
#[GetCollection(
    normalizationContext: ['groups' => ['user:land_request:collection']],
    parameters: [
        'order[:property]' => new QueryParameter(
            filter: 'land_request.order_filter'
        ),
        new QueryParameter(
            key: 'state',
            schema: [
                'type' => 'string',
                'enum' => LandRequestWorkflowPlace::PLACES,
                'example' => LandRequestWorkflowPlace::ARCHIVED,
            ],
            openApi: new Parameter(
                name: 'state',
                in: 'query',
                description: 'Filter by state',
                required: false,
                allowEmptyValue: true
            ),
            filter: 'land_request.state_filter'),
    ]
)]
#[GetCollection(
    uriTemplate: '/land_requests/public',
    normalizationContext: ['groups' => ['user:land_request:collection_public']],
    parameters: [
        'order[:property]' => new QueryParameter(
            filter: 'land_request.order_filter'
        ),
    ]
)]
#[Get(
    normalizationContext: ['groups' => ['user:land_request:get']],
    security: "object.getPerson() === user"
)]
#[Post(
    denormalizationContext: ['groups' => ['user:land_request:post']]
)]
#[Patch(
    denormalizationContext: ['groups' => ['user:land_request:patch']],
    security: "object.getPerson() === user"
)]
#[Patch(
    uriTemplate: '/land_requests/{ulid}/' . LandRequestWorkflowTransition::PUBLISH,
    options: ['transition' => LandRequestWorkflowTransition::PUBLISH],
    denormalizationContext: ['groups' => ['user:land_request:publish']],
    security: "object.getPerson() === user",
    name: 'publish',
    processor: WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate: '/land_requests/{ulid}/' . LandRequestWorkflowTransition::ARCHIVE,
    options: ['transition' => LandRequestWorkflowTransition::ARCHIVE],
    denormalizationContext: ['groups' => ['user:land_request:archive']],
    security: "object.getPerson() === user",
    name: 'archive',
    processor: WorkflowTransitionProcessor::class)]
#[Delete(security: "object.getPerson() === user and object.getState() === '" . LandRequestWorkflowPlace::DRAFT . "'")]
#[ORM\HasLifecycleCallbacks]
#[UniqueStatePerPerson(states: [LandRequestWorkflowPlace::DRAFT, LandRequestWorkflowPlace::PUBLISHED])]
class LandRequest extends AbstractIdOrmAndUlidApiIdentified implements StatePersonInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\ManyToOne(inversedBy: 'landRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(LandRequestWorkflowPlace::PLACES)]
    #[Groups(["user:land_request:collection", "user:land_request:get"])]
    private ?string $state = LandRequestWorkflowPlace::DRAFT;

    /**
     * @var array|null Tiptap JSON Object
     */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?array $message = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?int $minimumSurfaceWanted = null;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: GardeningLevel::ALL)]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?string $gardeningLevel = GardeningLevel::BEGINNER;

    #[ORM\Column]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?bool $hasTools = false;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?string $title = null;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: LandInteractionMode::ALL)]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?string $preferredGardenInteractionMode = LandInteractionMode::NO_PREFERENCE;

    #[ORM\Column]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?bool $supportsLocalFoodSecurity = false;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Assert\Choice(choices: LandSharingCondition::ALL, multiple: true)]
    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    private ?array $sharingConditions = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_request:collection", "user:land_request:get"])]
    private ?DateTimeImmutable $publishedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_request:collection", "user:land_request:get"])]
    private ?DateTimeImmutable $archivedAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_request:collection", "user:land_request:get"])]
    private ?DateTimeImmutable $expirationDate = null;

    #[Groups(["user:land_request:collection", "user:land_request:get", "user:land_request:post", "user:land_request:patch"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
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

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getMessage(): ?array
    {
        return $this->message;
    }

    public function setMessage(?array $message): static
    {
        $this->message = $message;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getMinimumSurfaceWanted(): ?int
    {
        return $this->minimumSurfaceWanted;
    }

    public function setMinimumSurfaceWanted(?int $minimumSurfaceWanted): static
    {
        $this->minimumSurfaceWanted = $minimumSurfaceWanted;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getGardeningLevel(): ?string
    {
        return $this->gardeningLevel;
    }

    public function setGardeningLevel(string $gardeningLevel): static
    {
        $this->gardeningLevel = $gardeningLevel;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getHasTools(): ?bool
    {
        return $this->hasTools;
    }

    public function setHasTools(bool $hasTools): static
    {
        $this->hasTools = $hasTools;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getPreferredGardenInteractionMode(): ?string
    {
        return $this->preferredGardenInteractionMode;
    }

    public function setPreferredGardenInteractionMode(?string $preferredGardenInteractionMode): static
    {
        $this->preferredGardenInteractionMode = $preferredGardenInteractionMode;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getSupportsLocalFoodSecurity(): ?bool
    {
        return $this->supportsLocalFoodSecurity;
    }

    public function setSupportsLocalFoodSecurity(bool $supportsLocalFoodSecurity): static
    {
        $this->supportsLocalFoodSecurity = $supportsLocalFoodSecurity;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getSharingConditions(): ?array
    {
        return $this->sharingConditions;
    }

    public function setSharingConditions(?array $sharingConditions): static
    {
        $this->sharingConditions = $sharingConditions;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getPublishedAt(): ?DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
    public function getArchivedAt(): ?DateTimeImmutable
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?DateTimeImmutable $archivedAt): static
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    #[Groups(["user:land_request:publish", "user:land_request:archive"])]
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
