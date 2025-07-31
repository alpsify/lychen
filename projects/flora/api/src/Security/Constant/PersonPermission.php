<?php

namespace App\Security\Constant;

use App\Security\Voter\LandMemberInvitationVoter;
use App\Security\Voter\LandMemberVoter;
use App\Security\Voter\LandProposalVoter;
use App\Security\Voter\LandRequestVoter;
use App\Security\Voter\LandVoter;
use App\Security\Voter\PersonApiKeyVoter;

final readonly class PersonPermission
{
    public const array ALL = [
        ...PersonApiKeyVoter::ALL_PERSON,
    ];
}
