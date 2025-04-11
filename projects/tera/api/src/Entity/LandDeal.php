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
            summary: 'Accept the LandDeal resource.',
        )
    ),
    new Patch(
        uriTemplate: '/land_deals/{ulid}/' . LandDealWorkflowTransition::REFUSE,
        openapi: new Operation(
            summary: 'Refuse the LandDeal resource.',
        )
    ),
    new Patch(
        uriTemplate: '/land_deals/{ulid}/' . LandDealWorkflowTransition::ARCHIVE,
        openapi: new Operation(
            summary: 'Archive the LandDeal resource.',
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

    #[ORM\ManyToOne(inversedBy: 'landDeals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\ManyToOne(inversedBy: 'landDeals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }
}
