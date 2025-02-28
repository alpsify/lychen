<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use App\Repository\LandMemberSettingRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Uid\Ulid;

#[ORM\Entity(repositoryClass: LandMemberSettingRepository::class)]
#[ApiResource()]
#[Patch(security: "object.getLandMember().getPerson() == user")]
#[Get(security: "object.getLandMember().getPerson() == user")]
class LandMemberSetting extends AbstractIdOrmAndUlidApiIdentified
{
    #[ORM\OneToOne(inversedBy: 'landMemberSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LandMember $landMember = null;

    #[ORM\Column]
    #[Groups(["user:land_member_setting:get", "user:land_member_setting:patch"])]
    private ?bool $emailNotificationActivated = false;

    #[Groups(["user:land_member_setting:get", "user:land_member_setting:patch"])]
    public function getUlid(): Ulid
    {
        return parent::getUlid();
    }

    public function isEmailNotificationActivated(): ?bool
    {
        return $this->emailNotificationActivated;
    }

    public function setEmailNotificationActivated(bool $emailNotificationActivated): static
    {
        $this->emailNotificationActivated = $emailNotificationActivated;

        return $this;
    }

    public function getLandMember(): ?LandMember
    {
        return $this->landMember;
    }

    public function setLandMember(LandMember $landMember): static
    {
        $this->landMember = $landMember;

        return $this;
    }
}
