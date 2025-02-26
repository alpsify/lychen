<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandGreenhouseRepository;
use App\Security\Interface\LandAwareInterface;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;

#[ORM\Entity(repositoryClass: LandGreenhouseRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class LandGreenhouse extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $constructionDate = null;

    /**
     * @var Collection<int, LandArea>
     */
    #[ORM\OneToMany(targetEntity: LandArea::class, mappedBy: 'landGreenhouse')]
    private Collection $landAreas;

    public function __construct()
    {
        parent::__construct();
        $this->landAreas = new ArrayCollection();
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
}
