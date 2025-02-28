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
use App\Processor\WorkflowTransitionProcessor;
use App\Repository\LandTaskRepository;
use App\Security\Constant\LandTaskPermission;
use App\Security\Interface\LandAwareInterface;
use App\Workflow\LandTask\LandTaskWorkflowPlace;
use App\Workflow\LandTask\LandTaskWorkflowTransition;
use ArrayObject;
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

#[ORM\Entity(repositoryClass: LandTaskRepository::class)]
#[ApiResource()]
#[Post(securityPostDenormalize: "is_granted('" . LandTaskPermission::CREATE . "', object)")]
#[Patch(security: "is_granted('" . LandTaskPermission::UPDATE . "', object)")]
#[Delete(security: "is_granted('" . LandTaskPermission::DELETE . "', object)")]
#[Get(security: "is_granted('" . LandTaskPermission::READ . "', object)")]
#[GetCollection(security: "is_granted('" . LandTaskPermission::READ . "')", parameters: [
    new QueryParameter(key: 'land', schema: ['type' => 'string'], openApi: new Parameter(name: 'land', in: 'query', description: 'Filter by land', required: true, allowEmptyValue: false), filter: LandFilter::class, required: true),
    'order[:property]' => new QueryParameter(filter: 'land_task.order_filter'),
])]
#[Patch(
    uriTemplate: '/land_tasks/{ulid}/' . LandTaskWorkflowTransition::MARK_AS_DONE,
    options: ['transition' => LandTaskWorkflowTransition::MARK_AS_DONE],
    openapi: new Operation(
        summary: 'Mark as done',
        requestBody: new RequestBody(
            content: new ArrayObject([
                'application/merge-patch+json' => [
                    'schema' => [
                        'type' => 'object',
                        'properties' => [],
                    ],
                ],
            ])
        )
    ),
    security: "is_granted('" . LandTaskPermission::MARK_AS_DONE . "', object)",
    name: 'mark-as-done',
    processor: WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate: '/land_tasks/{ulid}/' . LandTaskWorkflowTransition::MARK_AS_IN_PROGRESS,
    options: ['transition' => LandTaskWorkflowTransition::MARK_AS_IN_PROGRESS],
    openapi: new Operation(
        summary: 'Mark as done',
        requestBody: new RequestBody(
            content: new ArrayObject([
                'application/merge-patch+json' => [
                    'schema' => [
                        'type' => 'object',
                        'properties' => [],
                    ],
                ],
            ])
        )
    ),
    security: "is_granted('" . LandTaskPermission::MARK_AS_IN_PROGRESS . "', object)",
    name: 'mark-as-in-progress',
    processor: WorkflowTransitionProcessor::class)]
#[ORM\HasLifecycleCallbacks]
class LandTask extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_task:collection", "user:land_task:get", "user:land_task:patch", "user:land_task:post"])]
    #[Assert\NotBlank()]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'landTasks')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_task:get", "user:land_task:post"])]
    private ?Land $land = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["user:land_task:get", "user:land_task:patch", "user:land_task:post"])]
    private ?array $content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Assert\GreaterThanOrEqual(propertyPath: "startDate")]
    #[Groups(["user:land_task:collection", "user:land_task:get", "user:land_task:patch", "user:land_task:post"])]
    private ?DateTimeInterface $dueDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_task:collection", "user:land_task:get", "user:land_task:patch", "user:land_task:post"])]
    private ?DateTimeInterface $startDate = null;

    #[ORM\ManyToOne(inversedBy: 'landTasks')]
    #[Groups(["user:land_task:collection", "user:land_task:get", "user:land_task:patch", "user:land_task:post"])]
    private ?landArea $landArea = null;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_task:collection", "user:land_task:get"])]
    #[Assert\Choice(LandTaskWorkflowPlace::PLACES)]
    private ?string $state = LandTaskWorkflowPlace::TO_BE_DONE;

    #[Groups(["user:land_task:collection", "user:land_task:get", "user:land_task:patch", "user:land_task:post"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_task:get", "user:land_task:patch"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land_task:get", "user:land_task:patch"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
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

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(?Land $land): static
    {
        $this->land = $land;

        return $this;
    }

    public function getContent(): ?array
    {
        return $this->content;
    }

    public function setContent(?array $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getDueDate(): ?DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?DateTimeInterface $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
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

    public function getLandArea(): ?landArea
    {
        return $this->landArea;
    }

    public function setLandArea(?landArea $landArea): static
    {
        $this->landArea = $landArea;

        return $this;
    }

    #[Groups(["user:land_task:patch", "user:land_task:post"])]
    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }
}
