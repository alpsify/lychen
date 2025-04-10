<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\OpenApi\Model\Operation;
use App\Repository\LandDealRepository;
use App\Workflow\LandDeal\LandDealWorkflowPlace;
use App\Workflow\LandDeal\LandDealWorkflowTransition;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandDealRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
    new Patch(
        uriTemplate: '/land_deals/{ulid}/' . LandDealWorkflowTransition::ACCEPT,
        openapi: new Operation(
            summary: 'Accept the LandResearchDeal resource.',
        )
    ),
    new Patch(
        uriTemplate: '/land_deals/{ulid}/' . LandDealWorkflowTransition::REFUSE,
        openapi: new Operation(
            summary: 'Refuse the LandResearchDeal resource.',
        )
    ),
    new Patch(
        uriTemplate: '/land_deals/{ulid}/' . LandDealWorkflowTransition::ARCHIVE,
        openapi: new Operation(
            summary: 'Archive the LandResearchDeal resource.',
        )
    )
])]
#[ORM\HasLifecycleCallbacks]
class LandDeal extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(LandDealWorkflowPlace::PLACES)]
    private ?string $state = LandDealWorkflowPlace::OPENED;

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
