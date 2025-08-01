<?php

namespace App\Entity;

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
}
