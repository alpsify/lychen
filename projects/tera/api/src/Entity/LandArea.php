<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LandAreaRepository;
use App\Security\Interface\LandAwareInterface;
use App\Workflow\LandArea\LandAreaWorkflowPlace;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LandAreaRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class LandArea extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'landAreas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Land $land = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'landArea', cascade: ['persist', 'remove'])]
    private ?LandAreaSetting $landAreaSetting = null;

    #[ORM\OneToOne(mappedBy: 'landArea', cascade: ['persist', 'remove'])]
    private ?LandAreaParameter $landAreaParameter = null;

    #[ORM\ManyToOne(inversedBy: 'landAreas')]
    private ?LandGreenhouse $landGreenhouse = null;

    /**
     * @var Collection<int, LandTask>
     */
    #[ORM\OneToMany(targetEntity: LandTask::class, mappedBy: 'landArea')]
    private Collection $landTasks;

    #[Assert\Choice(LandAreaWorkflowPlace::PLACES)]
    #[ORM\Column(length: 255)]
    private ?string $state = LandAreaWorkflowPlace::ACTIVE;

    /**
     * @var Collection<int, LandCultivationPlan>
     */
    #[ORM\OneToMany(targetEntity: LandCultivationPlan::class, mappedBy: 'landArea')]
    private Collection $landCultivationPlans;

    public function __construct(?Ulid $ulid = null)
    {
        parent::__construct($ulid);
        $this->setLandAreaSetting(new LandAreaSetting());
        $this->setLandAreaParameter(new LandAreaParameter());
        $this->landTasks = new ArrayCollection();
        $this->landCultivationPlans = new ArrayCollection();
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

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(?Land $land): static
    {
        $this->land = $land;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLandAreaSetting(): ?LandAreaSetting
    {
        return $this->landAreaSetting;
    }

    public function setLandAreaSetting(LandAreaSetting $landAreaSetting): static
    {
        // set the owning side of the relation if necessary
        if ($landAreaSetting->getLandArea() !== $this) {
            $landAreaSetting->setLandArea($this);
        }

        $this->landAreaSetting = $landAreaSetting;

        return $this;
    }

    public function getLandAreaParameter(): ?LandAreaParameter
    {
        return $this->landAreaParameter;
    }

    public function setLandAreaParameter(LandAreaParameter $landAreaParameter): static
    {
        // set the owning side of the relation if necessary
        if ($landAreaParameter->getLandArea() !== $this) {
            $landAreaParameter->setLandArea($this);
        }

        $this->landAreaParameter = $landAreaParameter;

        return $this;
    }

    public function getLandGreenhouse(): ?LandGreenhouse
    {
        return $this->landGreenhouse;
    }

    public function setLandGreenhouse(?LandGreenhouse $landGreenhouse): static
    {
        $this->landGreenhouse = $landGreenhouse;

        return $this;
    }

    /**
     * @return Collection<int, LandTask>
     */
    public function getLandTasks(): Collection
    {
        return $this->landTasks;
    }

    public function addLandTask(LandTask $landTask): static
    {
        if (!$this->landTasks->contains($landTask)) {
            $this->landTasks->add($landTask);
            $landTask->setLandArea($this);
        }

        return $this;
    }

    public function removeLandTask(LandTask $landTask): static
    {
        if ($this->landTasks->removeElement($landTask)) {
            // set the owning side to null (unless already changed)
            if ($landTask->getLandArea() === $this) {
                $landTask->setLandArea(null);
            }
        }

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

    /**
     * @return Collection<int, LandCultivationPlan>
     */
    public function getLandCultivationPlans(): Collection
    {
        return $this->landCultivationPlans;
    }

    public function addLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if (!$this->landCultivationPlans->contains($landCultivationPlan)) {
            $this->landCultivationPlans->add($landCultivationPlan);
            $landCultivationPlan->setLandArea($this);
        }

        return $this;
    }

    public function removeLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if ($this->landCultivationPlans->removeElement($landCultivationPlan)) {
            // set the owning side to null (unless already changed)
            if ($landCultivationPlan->getLandArea() === $this) {
                $landCultivationPlan->setLandArea(null);
            }
        }

        return $this;
    }
}
