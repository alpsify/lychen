<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use App\Repository\LandMemberSettingRepository;
use App\Security\Constant\LandMemberSettingPermission;
use App\Security\Interface\LandAwareInterface;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;

#[ORM\Entity(repositoryClass: LandMemberSettingRepository::class)]
#[ApiResource()]
#[Patch(security: "is_granted('" . LandMemberSettingPermission::UPDATE . "', object)")] //TODO Secure by user
#[Get(security: "is_granted('" . LandMemberSettingPermission::READ . "', object)")] //TODO Secure by user
class LandMemberSetting extends AbstractIdOrmAndUlidApiIdentified implements LandAwareInterface
{
    #[ORM\OneToOne(inversedBy: 'landMemberSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LandMember $landMember = null;

    #[ORM\Column]
    private ?bool $emailNotificationActivated = false;

    public function isEmailNotificationActivated(): ?bool
    {
        return $this->emailNotificationActivated;
    }

    public function setEmailNotificationActivated(bool $emailNotificationActivated): static
    {
        $this->emailNotificationActivated = $emailNotificationActivated;

        return $this;
    }

    public function getLand(): ?Land
    {
        return $this->getLandMember()->getLand();
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
