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
use App\Doctrine\Filter\EmailFilter;
use App\Doctrine\Filter\LandFilter;
use App\Dto\LandMemberInvitationCheckEmailUnicityDto;
use App\Processor\WorkflowTransitionProcessor;
use App\Provider\LandMemberInvitationCheckEmailUnicityProvider;
use App\Repository\LandMemberInvitationRepository;
use App\Security\Constant\LandMemberInvitationPermission;
use App\Security\Interface\LandAwareInterface;
use App\Validator\LandRolesBelongToLand;
use App\Workflow\LandMemberInvitation\LandMemberInvitationWorkflowPlace;
use App\Workflow\LandMemberInvitation\LandMemberInvitationWorkflowTransition;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandMemberInvitationRepository::class)]
#[ApiResource]
#[Post(denormalizationContext: ['groups' => ['user:land_member_invitation:post']], securityPostDenormalize: "is_granted('" . LandMemberInvitationPermission::CREATE . "', object)")]
#[Patch(denormalizationContext: ['groups' => ['user:land_member_invitation:patch']], security: "is_granted('" . LandMemberInvitationPermission::UPDATE . "', object)")]
#[Patch(
    uriTemplate: '/land_member_invitations/{ulid}/' . LandMemberInvitationWorkflowTransition::ACCEPT,
    options: ['transition' => LandMemberInvitationWorkflowTransition::ACCEPT],
    denormalizationContext: ['groups' => ['user:land_member_invitation:accept']],
    security: "is_granted('" . LandMemberInvitationPermission::ACCEPT . "', object)",
    name: 'accept',
    processor: WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate: '/land_member_invitations/{ulid}/' . LandMemberInvitationWorkflowTransition::REFUSE,
    options: ['transition' => LandMemberInvitationWorkflowTransition::REFUSE],
    denormalizationContext: ['groups' => ['user:land_member_invitation:refuse']],
    security: "is_granted('" . LandMemberInvitationPermission::REFUSE . "', object)",
    name: 'refuse',
    processor: WorkflowTransitionProcessor::class)]
#[Delete(security: "is_granted('" . LandMemberInvitationPermission::DELETE . "', object)")]
#[Get(
    uriTemplate: '/land_member_invitations/{ulid}',
    requirements: ['ulid' => '[0-9A-HJKMNP-TV-Z]{26}'],
    normalizationContext: ['groups' => ['user:land_member_invitation:get']],
    security: "is_granted('" . LandMemberInvitationPermission::READ . "', object)",
    priority: 10)]
#[GetCollection(
    normalizationContext: ['groups' => ['user:land_member_invitation:collection']],
    security: "is_granted('" . LandMemberInvitationPermission::READ . "')",
    parameters: [
        new QueryParameter(
            key: 'land',
            schema: ['type' => 'string'],
            openApi: new Parameter(
                name: 'land',
                in: 'query',
                description: 'Filter by land',
                required: true,
                allowEmptyValue: false
            ),
            filter: LandFilter::class,
            required: true
        )
    ])]
#[GetCollection(
    uriTemplate: '/land_member_invitations/by_email',
    normalizationContext: ['groups' => ['user:land_member_invitation:collection-by-email']],
    security: "user.getEmail() === request.query.get('email')",
    name: 'collection-by-email',
    parameters: [
        new QueryParameter(
            key: 'email',
            schema: ['type' => 'string'],
            openApi: new Parameter(
                name: 'email',
                in: 'query',
                description: 'Filter by email',
                required: true,
                allowEmptyValue: false
            ),
            filter: EmailFilter::class,
            required: true
        ),
        new QueryParameter(key: 'state', schema: ['type' => 'string', 'enum' => LandMemberInvitationWorkflowPlace::PLACES, 'example' => LandMemberInvitationWorkflowPlace::PENDING], openApi: new Parameter(name: 'state', in: 'query', description: 'Filter by state', required: false, allowEmptyValue: true), filter: 'land_member_invitation.state_filter')
    ]
)]
#[Get(
    uriTemplate: '/land_member_invitations/check_email_unicity',
    openapi: new Operation(
        operationId: 'checkLandMemberInvitationEmailUnicity',
        responses: [
            Response::HTTP_OK => [
                'description' => 'Email unicity check result',
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type' => 'object',
                            'properties' => [
                                'isUnique' => ['type' => 'boolean'],
                            ],
                        ],
                    ],
                ],
            ],
            Response::HTTP_BAD_REQUEST => [
                'description' => 'Bad request',
            ],
        ],
        summary: 'Check if an email is unique for a given land',
        parameters: [
            new Parameter(
                name: 'email',
                in: 'query',
                description: 'The email to check',
                required: true,
                schema: ['type' => 'string'],
            ),
            new Parameter(
                name: 'land',
                in: 'query',
                description: 'The land IRI to check against',
                required: true,
                schema: ['type' => 'string'],
            ),
        ],
        requestBody: null,
    ),
    output: LandMemberInvitationCheckEmailUnicityDto::class,
    priority: 20,
    name: 'check-email-unicity',
    provider: LandMemberInvitationCheckEmailUnicityProvider::class
)]
#[ORM\HasLifecycleCallbacks]
#[ORM\UniqueConstraint(name: 'land_member_invitation_unique_email_land', columns: ['email', 'land_id'])]
#[LandRolesBelongToLand]
class LandMemberInvitation extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;

    #[ORM\ManyToOne(inversedBy: 'landMemberInvitations')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_member_invitation:get", "user:land_member_invitation:post", "user:land_member_invitation:collection-by-email"])]
    private ?Land $land = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email()]
    #[Groups(["user:land_member_invitation:collection", "user:land_member_invitation:get", "user:land_member_invitation:post"])]
    private ?string $email = null;

    /**
     * @var Collection<int, LandRole>
     */
    #[ORM\ManyToMany(targetEntity: LandRole::class)]
    #[Groups(["user:land_member_invitation:collection", "user:land_member_invitation:get", "user:land_member_invitation:patch", "user:land_member_invitation:post", "user:land_member_invitation:collection-by-email"])]
    #[Assert\Valid(groups: ['user:land_member_invitation:patch', 'user:land_member_invitation:post'])]
    private Collection $landRoles;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_member_invitation:collection", "user:land_member_invitation:get"])]
    #[Assert\Choice(LandMemberInvitationWorkflowPlace::PLACES)]
    private ?string $state = LandMemberInvitationWorkflowPlace::PENDING;

    #[ORM\ManyToOne(inversedBy: 'landMemberInvitations')]
    #[Groups(["user:land_member_invitation:collection", "user:land_member_invitation:get"])] // Has to be present in order to do some checks on front-end
    private ?Person $person = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $acceptedAt = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $refusedAt = null;

    public function __construct()
    {
        parent::__construct();
        $this->landRoles = new ArrayCollection();
    }

    #[Groups(["user:land_member_invitation:collection", "user:land_member_invitation:get", "user:land_member_invitation:post", "user:land_member_invitation:collection-by-email"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_member_invitation:get", "user:land_member_invitation:collection-by-email"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, LandRole>
     */
    public function getLandRoles(): Collection
    {
        return $this->landRoles;
    }

    public function addLandRole(LandRole $landRole): static
    {
        if (!$this->landRoles->contains($landRole)) {
            $this->landRoles->add($landRole);
        }

        return $this;
    }

    public function removeLandRole(LandRole $landRole): static
    {
        $this->landRoles->removeElement($landRole);

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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    public function getAcceptedAt(): ?DateTimeImmutable
    {
        return $this->acceptedAt;
    }

    public function setAcceptedAt(?DateTimeImmutable $acceptedAt): static
    {
        $this->acceptedAt = $acceptedAt;

        return $this;
    }

    public function getRefusedAt(): ?DateTimeImmutable
    {
        return $this->refusedAt;
    }

    public function setRefusedAt(?DateTimeImmutable $refusedAt): static
    {
        $this->refusedAt = $refusedAt;

        return $this;
    }
}
