<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\PlantConversionRequestRepository;
use App\Workflow\PlantConversionRequest\PlantConversionRequestWorkflowPlace;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlantConversionRequestRepository::class)]
#[ApiResource]
#[GetCollection()]
#[Post()]
#[Patch()]
#[Delete()]
#[Get()]
#[ORM\HasLifecycleCallbacks]
class PlantConversionRequest extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\OneToOne(inversedBy: 'plantConversionRequest', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlantCustom $plantCustom = null;

    #[Assert\Choice(PlantConversionRequestWorkflowPlace::PLACES)]
    #[ORM\Column(length: 255)]
    private ?string $state = PlantConversionRequestWorkflowPlace::OPENED;

    #[ORM\ManyToOne(inversedBy: 'plantConversionRequests')]
    private ?PlantGlobal $mergeCandidate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    public function getPlantCustom(): ?PlantCustom
    {
        return $this->plantCustom;
    }

    public function setPlantCustom(PlantCustom $plantCustom): static
    {
        $this->plantCustom = $plantCustom;

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

    public function getMergeCandidate(): ?PlantGlobal
    {
        return $this->mergeCandidate;
    }

    public function setMergeCandidate(?PlantGlobal $mergeCandidate): static
    {
        $this->mergeCandidate = $mergeCandidate;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
