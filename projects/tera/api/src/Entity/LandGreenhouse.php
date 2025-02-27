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
use App\Doctrine\Filter\LandFilter;
use App\Repository\LandGreenhouseRepository;
use App\Security\Constant\LandGreenhousePermission;
use App\Security\Interface\LandAwareInterface;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandGreenhouseRepository::class)]
#[ApiResource]
#[Post(securityPostDenormalize: "is_granted('" . LandGreenhousePermission::CREATE . "', object)")]
#[Patch(security: "is_granted('" . LandGreenhousePermission::UPDATE . "', object)")]
#[Delete(security: "is_granted('" . LandGreenhousePermission::DELETE . "', object)")]
#[Get(security: "is_granted('" . LandGreenhousePermission::READ . "', object)")]
#[GetCollection(security: "is_granted('" . LandGreenhousePermission::READ . "')", parameters: [
    new QueryParameter(key: 'land', schema: ['type' => 'string'], openApi: new Parameter(name: 'land', in: 'query', description: 'Filter by land', required: true, allowEmptyValue: false), filter: LandFilter::class, required: true)
])]
#[ORM\HasLifecycleCallbacks]
class LandGreenhouse extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    #[Groups(["user:land_greenhouse:collection", "user:land_greenhouse:get", "user:land_greenhouse:patch", "user:land_greenhouse:post"])]
    #[Assert\NotBlank()]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["user:land_greenhouse:collection", "user:land_greenhouse:get", "user:land_greenhouse:patch", "user:land_greenhouse:post"])]
    private ?DateTimeInterface $constructionDate = null;

    /**
     * @var Collection<int, LandArea>
     */
    #[ORM\OneToMany(targetEntity: LandArea::class, mappedBy: 'landGreenhouse')]
    #[Groups(["user:land_greenhouse:collection", "user:land_greenhouse:get"])]
    private Collection $landAreas;

    #[ORM\ManyToOne(inversedBy: 'landGreenhouses')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_greenhouse:get", "user:land_greenhouse:post"])]
    private ?Land $land = null;

    public function __construct()
    {
        parent::__construct();
        $this->landAreas = new ArrayCollection();
    }

    #[Groups(["user:land_greenhouse:collection", "user:land_greenhouse:get", "user:land_greenhouse:patch", "user:land_greenhouse:post"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    #[Groups(["user:land_greenhouse:get", "user:land_greenhouse:patch"])]
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["user:land_greenhouse:get", "user:land_greenhouse:patch"])]
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
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

    public function getConstructionDate(): ?DateTimeInterface
    {
        return $this->constructionDate;
    }

    public function setConstructionDate(?DateTimeInterface $constructionDate): static
    {
        $this->constructionDate = $constructionDate;

        return $this;
    }

    /**
     * @return Collection<int, LandArea>
     */
    public function getLandAreas(): Collection
    {
        return $this->landAreas;
    }

    public function addLandArea(LandArea $landArea): static
    {
        if (!$this->landAreas->contains($landArea)) {
            $this->landAreas->add($landArea);
            $landArea->setLandGreenhouse($this);
        }

        return $this;
    }

    public function removeLandArea(LandArea $landArea): static
    {
        if ($this->landAreas->removeElement($landArea)) {
            // set the owning side to null (unless already changed)
            if ($landArea->getLandGreenhouse() === $this) {
                $landArea->setLandGreenhouse(null);
            }
        }

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
}
