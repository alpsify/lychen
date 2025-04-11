<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
#[ApiResource]
#[ORM\HasLifecycleCallbacks]
class Address extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $streetLine = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 2, nullable: true)]
    #[Assert\Country()]
    private ?string $countryCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): static
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getStreetLine(): ?string
    {
        return $this->streetLine;
    }

    public function setStreetLine(string $streetLine): static
    {
        $this->streetLine = $streetLine;

        return $this;
    }
}
