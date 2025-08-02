<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\PlantRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
#[ApiResource]
#[Post(
    normalizationContext   : ['groups' => ['plant:post', 'plant:post:output']],
    denormalizationContext : ['groups' => ['plant:post', 'plant:post:input']]
)]
#[Patch(
    normalizationContext  : ['groups' => ['plant:patch', 'plant:patch:output']],
    denormalizationContext: ['groups' => ['plant:patch', 'plant:patch:input']]
)]
#[Delete()]
#[Get(normalizationContext: ['groups' => ['plant:get']])]
#[GetCollection(
    normalizationContext: ['groups' => ['plant:collection']],
)]
#[ORM\HasLifecycleCallbacks]
class Plant extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column]
    #[ApiProperty(
        description: 'A boolean indicating if the plant is perennial or not',
    )]
    private ?bool $perennial = null;

    #[Groups(["plant:get"])]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Groups(["plant:get"])]
    #[ORM\Column(length: 255)]
    private ?string $scientificName = null;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    private ?LunarType $lunarType = null;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Species $species = null;

    #[ORM\OneToOne(inversedBy: 'plant', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cultivation $cultivation = null;

    #[Groups(["plant:get"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["plant:get"])]
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["plant:get"])]
    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function isPerennial(): ?bool
    {
        return $this->perennial;
    }

    public function setPerennial(bool $perennial): static
    {
        $this->perennial = $perennial;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    public function setScientificName(string $scientificName): static
    {
        $this->scientificName = $scientificName;

        return $this;
    }

    public function getLunarType(): ?LunarType
    {
        return $this->lunarType;
    }

    public function setLunarType(?LunarType $lunarType): static
    {
        $this->lunarType = $lunarType;

        return $this;
    }

    public function getSpecies(): ?Species
    {
        return $this->species;
    }

    public function setSpecies(?Species $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getCultivation(): ?Cultivation
    {
        return $this->cultivation;
    }

    public function setCultivation(Cultivation $cultivation): static
    {
        $this->cultivation = $cultivation;

        return $this;
    }
}
