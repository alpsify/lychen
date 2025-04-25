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
        ...LandRequestVoter::ALL_PERSON,
        ...LandVoter::ALL_PERSON,
        ...LandMemberVoter::ALL_PERSON,
        ...LandMemberInvitationVoter::ALL_PERSON,
        ...PersonApiKeyVoter::ALL_PERSON,
        ...LandProposalVoter::ALL_PERSON,
    ];
}
