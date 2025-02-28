<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use App\Repository\LandSettingRepository;
use App\Security\Constant\LandSettingPermission;
use App\Security\Interface\LandAwareInterface;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: LandSettingRepository::class)]
#[ApiResource()]
#[Patch(security: "is_granted('" . LandSettingPermission::UPDATE . "', object)")]
#[Get(security: "is_granted('" . LandSettingPermission::READ . "', object)")]
class LandSetting extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    #[ORM\OneToOne(inversedBy: 'landSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["user:land_setting:get"])]
    private ?Land $land = null;

    #[ORM\Column]
    #[Groups(["user:land_setting:get", "user:land_setting:patch"])]
    private ?bool $lookingForMember = false;

    #[Groups(["user:land_setting:patch", "user:land_setting:get"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    public function getLand(): ?Land
    {
        return $this->land;
    }

    public function setLand(Land $land): static
    {
        $this->land = $land;

        return $this;
    }

    public function isLookingForMember(): ?bool
    {
        return $this->lookingForMember;
    }

    public function setLookingForMember(bool $lookingForMember): static
    {
        $this->lookingForMember = $lookingForMember;

        return $this;
    }
}
