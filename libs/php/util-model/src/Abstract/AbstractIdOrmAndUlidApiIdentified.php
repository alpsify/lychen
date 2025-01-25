<?php

namespace Lychen\UtilModel\Abstract;

use ApiPlatform\Metadata\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Interface\IdIdentifiedInterface;
use Lychen\UtilModel\Interface\UlidIdentifiedInterface;
use Symfony\Bridge\Doctrine\Types\UlidType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Uid\Ulid;

/**
 * Create default $id(int) as ORM\Id and $ulid(ulid) as api identifier. <br/>
 * Possibility to give Ulid through constructor,if null it's auto-generated.
 */
#[UniqueEntity(fields: ['ulid'], message: 'Ulid already used.', groups: ['Default'])]
#[ORM\MappedSuperclass]
abstract class AbstractIdOrmAndUlidApiIdentified implements UlidIdentifiedInterface, IdIdentifiedInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: false)]
    protected ?int $id = null;

    #[ApiProperty(identifier: true)]
    #[ORM\Column(type: UlidType::NAME, unique: true)]
    protected Ulid $ulid;

    public function __construct(?Ulid $ulid = null)
    {
        $this->ulid = $ulid ?: new Ulid();
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
}
