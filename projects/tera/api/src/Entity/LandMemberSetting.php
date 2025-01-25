<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use App\Repository\LandMemberSettingRepository;
use Doctrine\ORM\Mapping as ORM;
use Lychen\UtilModel\Abstract\AbstractIdOrmAndUlidApiIdentified;

#[ORM\Entity(repositoryClass: LandMemberSettingRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Patch()
]
)]
class LandMemberSetting extends AbstractIdOrmAndUlidApiIdentified
{
    #[ORM\OneToOne(inversedBy: 'landMemberSetting', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LandMember $landMember = null;

    #[ORM\Column]
    private ?bool $emailNotificationActivated = false;

    public function getLandMember(): ?LandMember
    {
        return $this->landMember;
    }

    public function setLandMember(LandMember $landMember): static
    {
        $this->landMember = $landMember;

        return $this;
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
}
