<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\ExposureRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Lychen\UtilModel\Trait\CreatedAtTrait;
use Lychen\UtilModel\Trait\UpdatedAtTrait;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ExposureRepository::class)]
#[ApiResource]
#[Post(
    normalizationContext   : ['groups' => ['exposure:post', 'exposure:post:output']],
    denormalizationContext : ['groups' => ['exposure:post', 'exposure:post:input']]
)]
#[Patch(
    normalizationContext  : ['groups' => ['exposure:patch', 'exposure:patch:output']],
    denormalizationContext: ['groups' => ['exposure:patch', 'exposure:patch:input']]
)]
#[Delete()]
#[Get(normalizationContext: ['groups' => ['exposure:get']])]
#[GetCollection(
    normalizationContext: ['groups' => ['exposure:collection']],
)]
#[ORM\HasLifecycleCallbacks]
class Exposure extends AbstractIdOrmAndUlidApiIdentified
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $code = null;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }
}
