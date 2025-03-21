<?php

namespace App\Dto;

use Symfony\Component\Serializer\Annotation\Groups;

class LandMemberInvitationCheckEmailUnicityDto
{
    public function __construct(
        #[Groups(['user:land_member_invitation:check-email-unicity'])] public bool $isUnique
    )
    {
    }
}
