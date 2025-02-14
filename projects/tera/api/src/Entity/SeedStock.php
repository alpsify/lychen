<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SeedStockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;

#[ORM\Entity(repositoryClass: SeedStockRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class SeedStock extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'seedStocks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $person = null;

    /**
     * @var Collection<int, SeedStockEntry>
     */
    #[ORM\OneToMany(targetEntity: SeedStockEntry::class, mappedBy: 'seedStock', orphanRemoval: true)]
    private Collection $seedStockEntries;

    /**
     * @var Collection<int, Land>
     */
    #[ORM\ManyToMany(targetEntity: Land::class, mappedBy: 'seedStocks')]
    private Collection $lands;

    public function __construct()
    {
        parent::__construct();
        $this->seedStockEntries = new ArrayCollection();
        $this->lands = new ArrayCollection();
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

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): static
    {
        $this->person = $person;

        return $this;
    }

    /**
     * @return Collection<int, SeedStockEntry>
     */
    public function getSeedStockEntries(): Collection
    {
        return $this->seedStockEntries;
    }

    public function addSeedStockEntry(SeedStockEntry $seedStockEntry): static
    {
        if (!$this->seedStockEntries->contains($seedStockEntry)) {
            $this->seedStockEntries->add($seedStockEntry);
            $seedStockEntry->setSeedStock($this);
        }

        return $this;
    }

    public function removeSeedStockEntry(SeedStockEntry $seedStockEntry): static
    {
        if ($this->seedStockEntries->removeElement($seedStockEntry)) {
            // set the owning side to null (unless already changed)
            if ($seedStockEntry->getSeedStock() === $this) {
                $seedStockEntry->setSeedStock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Land>
     */
    public function getLands(): Collection
    {
        return $this->lands;
    }

    public function addLand(Land $land): static
    {
        if (!$this->lands->contains($land)) {
            $this->lands->add($land);
            $land->addSeedStock($this);
        }

        return $this;
    }

    public function removeLand(Land $land): static
    {
        if ($this->lands->removeElement($land)) {
            $land->removeSeedStock($this);
        }

        return $this;
    }
}
