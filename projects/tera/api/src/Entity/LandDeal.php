<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Processor\WorkflowTransitionProcessor;
use App\Repository\LandDealRepository;
use App\Workflow\LandDeal\LandDealWorkflowPlace;
use App\Workflow\LandDeal\LandDealWorkflowTransition;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandDealRepository::class)]
#[ApiResource()]
#[Get(normalizationContext: ['groups' => ['land_deal:get']],)]
#[GetCollection(normalizationContext: ['groups' => ['land_deal:collection']],)]
#[Post(
    normalizationContext  : ['groups' => ['land_deal:post', 'land_deal:post:output']],
    denormalizationContext: ['groups' => ['land_deal:post', 'land_deal:post:input']],
)]
#[Patch(
    normalizationContext  : ['groups' => ['land_deal:patch', 'land_deal:patch:output']],
    denormalizationContext: ['groups' => ['land_deal:patch', 'land_deal:patch:input']],
)]
#[Delete()]
#[Patch(
    uriTemplate           : '/land_deals/{ulid}/' . LandDealWorkflowTransition::ACCEPT,
    options               : ['transition' => LandDealWorkflowTransition::ACCEPT],
    normalizationContext  : ['groups' => ['land_deal:accept', 'land_deal:accept:output']],
    denormalizationContext: ['groups' => ['land_deal:accept', 'land_deal:accept:input']],
    processor             : WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate           : '/land_deals/{ulid}/' . LandDealWorkflowTransition::REFUSE,
    options               : ['transition' => LandDealWorkflowTransition::REFUSE],
    normalizationContext  : ['groups' => ['land_deal:refuse', 'land_deal:refuse:output']],
    denormalizationContext: ['groups' => ['land_deal:refuse', 'land_deal:refuse:input']],
    processor             : WorkflowTransitionProcessor::class)]
#[Patch(
    uriTemplate           : '/land_deals/{ulid}/' . LandDealWorkflowTransition::ARCHIVE,
    options               : ['transition' => LandDealWorkflowTransition::ARCHIVE],
    normalizationContext  : ['groups' => ['land_deal_archive', 'land_deal_archive:output']],
    denormalizationContext: ['groups' => ['land_deal_archive', 'land_deal_archive:input']],
    processor             : WorkflowTransitionProcessor::class)]
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
