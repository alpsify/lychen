<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\OpenApi\Model\Operation;
use App\Model\Abstract\AbstractIdOrmAndUlidApiIdentified;
use App\Model\Trait\CreatedAtTrait;
use App\Model\Trait\UpdatedAtTrait;
use App\Repository\LandResearchDealRepository;
use App\Workflow\LandResearchDeal\LandResearchDealWorkflowPlace;
use App\Workflow\LandResearchDeal\LandResearchDealWorkflowTransition;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandResearchDealRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
    new Patch(
        uriTemplate: '/land_research_deals/{ulid}/' . LandResearchDealWorkflowTransition::ACCEPT,
        openapi: new Operation(
            summary: 'Accept the LandResearchDeal resource.',
        )
    ),
    new Patch(
        uriTemplate: '/land_research_deals/{ulid}/' . LandResearchDealWorkflowTransition::REFUSE,
        openapi: new Operation(
            summary: 'Refuse the LandResearchDeal resource.',
        )
    ),
    new Patch(
        uriTemplate: '/land_research_deals/{ulid}/' . LandResearchDealWorkflowTransition::ARCHIVE,
        openapi: new Operation(
            summary: 'Archive the LandResearchDeal resource.',
        )
    )
])]
#[ORM\HasLifecycleCallbacks]
class LandResearchDeal extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(LandResearchDealWorkflowPlace::PLACES)]
    private ?string $state = LandResearchDealWorkflowPlace::OPENED;

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
