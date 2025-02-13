<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use App\Constant\Month;
use App\Constant\PlantExposure;
use App\Constant\PlantFamily;
use App\Constant\PlantMaturity;
use App\Constant\PlantSpecies;
use App\Constant\SoilType;
use App\Repository\PlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Interface\IdIdentifiedInterface;
use Lychen\UtilModel\Interface\UlidIdentifiedInterface;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Bridge\Doctrine\Types\UlidType;
use Symfony\Component\Uid\Ulid;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity(repositoryClass: PlantRepository::class)]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'kind', type: Types::STRING)]
#[ORM\DiscriminatorMap([Plant::KIND_GLOBAL => PlantGlobal::class, Plant::KIND_PERSON => PlantCustom::class])]
#[ORM\HasLifecycleCallbacks]
abstract class Plant implements IdIdentifiedInterface, UlidIdentifiedInterface
{
    public const string KIND_GLOBAL = 'global';
    public const string KIND_PERSON = 'person';

    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    protected ?int $id = null;

    #[ApiProperty(identifier: true)]
    #[ORM\Column(type: UlidType::NAME, unique: true)]
    protected Ulid $ulid;

    #[ORM\Column(length: 255)]
    protected ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $latinName = null;

    #[ORM\Column]
    protected ?bool $perpetual = false;

    #[ORM\Column(nullable: true)]
    protected ?int $daysToGerminationAverage = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $variety = null;

    #[ORM\Column(nullable: true)]
    protected ?int $sowingMinimalTemperature = null;

    #[ORM\Column(nullable: true)]
    protected ?int $sowingOptimalTemperature = null;

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(Month::ALL, multiple: true)]
    protected ?array $sowingMonths = null;

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(Month::ALL, multiple: true)]
    protected ?array $harvestingMonths = null;

    #[ORM\Column]
    protected ?bool $bio = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(PlantMaturity::ALL)]
    protected ?string $maturity = PlantMaturity::STANDARD;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Choice(SoilType::ALL)]
    protected ?string $soilType = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Choice(PlantExposure::ALL)]
    protected ?string $exposure = PlantExposure::FULL_SUN;

    #[ORM\Column(nullable: true)]
    protected ?int $vegetationThreshold = null;

    #[ORM\Column(nullable: true)]
    protected ?int $daysToHarvestMin = null;

    #[ORM\Column(nullable: true)]
    protected ?int $daysToHarvestMax = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Choice(PlantSpecies::ALL)]
    private ?string $species = null;

    #[ORM\Column(nullable: true, options: ['jsonb' => true])]
    #[Assert\Choice(PlantFamily::ALL, multiple: true)]
    private ?array $family = null;

    #[ORM\Column(nullable: true)]
    private ?int $plantingSpacingInCm = null;

    /**
     * @var Collection<int, LandCultivationPlan>
     */
    #[ORM\OneToMany(targetEntity: LandCultivationPlan::class, mappedBy: 'plant', orphanRemoval: true)]
    private Collection $landCultivationPlans;

    public function __construct(?Ulid $ulid = null)
    {
        $this->ulid = $ulid ?: new Ulid();
        $this->landCultivationPlans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUlid(): Ulid
    {
        return $this->ulid;
    }

    public function setUlid(Ulid $ulid): self
    {
        $this->ulid = $ulid;

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

    public function getLatinName(): ?string
    {
        return $this->latinName;
    }

    public function setLatinName(?string $latinName): static
    {
        $this->latinName = $latinName;

        return $this;
    }

    public function isPerpetual(): ?bool
    {
        return $this->perpetual;
    }

    public function setPerpetual(bool $perpetual): static
    {
        $this->perpetual = $perpetual;

        return $this;
    }

    public function getDaysToGerminationAverage(): ?int
    {
        return $this->daysToGerminationAverage;
    }

    public function setDaysToGerminationAverage(?int $daysToGerminationAverage): static
    {
        $this->daysToGerminationAverage = $daysToGerminationAverage;

        return $this;
    }

    public function getVariety(): ?string
    {
        return $this->variety;
    }

    public function setVariety(?string $variety): static
    {
        $this->variety = $variety;

        return $this;
    }

    public function getSowingMinimalTemperature(): ?int
    {
        return $this->sowingMinimalTemperature;
    }

    public function setSowingMinimalTemperature(?int $sowingMinimalTemperature): static
    {
        $this->sowingMinimalTemperature = $sowingMinimalTemperature;

        return $this;
    }

    public function getSowingOptimalTemperature(): ?int
    {
        return $this->sowingOptimalTemperature;
    }

    public function setSowingOptimalTemperature(?int $sowingOptimalTemperature): static
    {
        $this->sowingOptimalTemperature = $sowingOptimalTemperature;

        return $this;
    }

    public function getSowingMonths(): ?array
    {
        return $this->sowingMonths;
    }

    public function setSowingMonths(?array $sowingMonths): static
    {
        $this->sowingMonths = $sowingMonths;

        return $this;
    }

    public function getHarvestingMonths(): ?array
    {
        return $this->harvestingMonths;
    }

    public function setHarvestingMonths(?array $harvestingMonths): static
    {
        $this->harvestingMonths = $harvestingMonths;

        return $this;
    }

    public function isBio(): ?bool
    {
        return $this->bio;
    }

    public function setBio(bool $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getMaturity(): ?string
    {
        return $this->maturity;
    }

    public function setMaturity(string $maturity): static
    {
        $this->maturity = $maturity;

        return $this;
    }

    public function getSoilType(): ?string
    {
        return $this->soilType;
    }

    public function setSoilType(string $soilType): static
    {
        $this->soilType = $soilType;

        return $this;
    }

    public function getExposure(): ?string
    {
        return $this->exposure;
    }

    public function setExposure(string $exposure): static
    {
        $this->exposure = $exposure;

        return $this;
    }

    public function getVegetationThreshold(): ?int
    {
        return $this->vegetationThreshold;
    }

    public function setVegetationThreshold(?int $vegetationThreshold): static
    {
        $this->vegetationThreshold = $vegetationThreshold;

        return $this;
    }

    public function getDaysToHarvestMin(): ?int
    {
        return $this->daysToHarvestMin;
    }

    public function setDaysToHarvestMin(?int $daysToHarvestMin): static
    {
        $this->daysToHarvestMin = $daysToHarvestMin;

        return $this;
    }

    public function getDaysToHarvestMax(): ?int
    {
        return $this->daysToHarvestMax;
    }

    public function setDaysToHarvestMax(?int $daysToHarvestMax): static
    {
        $this->daysToHarvestMax = $daysToHarvestMax;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(string $species): static
    {
        $this->species = $species;

        return $this;
    }

    public function getFamily(): ?array
    {
        return $this->family;
    }

    public function setFamily(?array $family): static
    {
        $this->family = $family;

        return $this;
    }

    public function getPlantingSpacingInCm(): ?int
    {
        return $this->plantingSpacingInCm;
    }

    public function setPlantingSpacingInCm(?int $plantingSpacingInCm): static
    {
        $this->plantingSpacingInCm = $plantingSpacingInCm;

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
            $landCultivationPlan->setPlant($this);
        }

        return $this;
    }

    public function removeLandCultivationPlan(LandCultivationPlan $landCultivationPlan): static
    {
        if ($this->landCultivationPlans->removeElement($landCultivationPlan)) {
            // set the owning side to null (unless already changed)
            if ($landCultivationPlan->getPlant() === $this) {
                $landCultivationPlan->setPlant(null);
            }
        }

        return $this;
    }
}
