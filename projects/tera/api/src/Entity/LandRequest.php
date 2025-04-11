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
use App\Repository\LandRequestRepository;
use App\Workflow\LandRequest\LandRequestWorkflowPlace;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandRequestRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Patch(),
    new Delete(),
])]
#[ORM\HasLifecycleCallbacks]
class LandRequest extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\ManyToOne(inversedBy: 'landRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(LandRequestWorkflowPlace::PLACES)]
    private ?string $state = LandRequestWorkflowPlace::DRAFT;

    #[ORM\Column(nullable: true)]
    private ?array $message = null;

    #[ORM\Column(nullable: true)]
    private ?int $minimumSurfaceWanted = null;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: GardeningLevel::ALL)]
    private ?string $gardeningLevel = GardeningLevel::BEGINNER;

    #[ORM\Column]
    private ?bool $hasTools = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(choices: LandInteractionMode::ALL)]
    private ?string $preferredGardenInteractionMode = LandInteractionMode::NO_PREFERENCE;

    #[ORM\Column]
    private ?bool $supportsLocalFoodSecurity = false;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    #[Assert\Choice(choices: LandSharingCondition::ALL, multiple: true)]
    private ?array $sharingConditions = null;

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

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

    public function getMessage(): ?array
    {
        return $this->message;
    }

    public function setMessage(?array $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getMinimumSurfaceWanted(): ?int
    {
        return $this->minimumSurfaceWanted;
    }

    public function setMinimumSurfaceWanted(?int $minimumSurfaceWanted): static
    {
        $this->minimumSurfaceWanted = $minimumSurfaceWanted;

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

    public function hasTools(): ?bool
    {
        return $this->hasTools;
    }

    public function setHasTools(bool $hasTools): static
    {
        $this->hasTools = $hasTools;

        return $this;
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

    public function getPreferredGardenInteractionMode(): ?string
    {
        return $this->preferredGardenInteractionMode;
    }

    public function setPreferredGardenInteractionMode(?string $preferredGardenInteractionMode): static
    {
        $this->preferredGardenInteractionMode = $preferredGardenInteractionMode;

        return $this;
    }

    public function isSupportsLocalFoodSecurity(): ?bool
    {
        return $this->supportsLocalFoodSecurity;
    }

    public function setSupportsLocalFoodSecurity(bool $supportsLocalFoodSecurity): static
    {
        $this->supportsLocalFoodSecurity = $supportsLocalFoodSecurity;

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
}
