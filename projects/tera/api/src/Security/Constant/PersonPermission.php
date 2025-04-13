<?php

namespace App\Security\Constant;

use App\Security\Voter\LandMemberVoter;
use App\Security\Voter\LandRequestVoter;
use App\Security\Voter\LandVoter;

final readonly class PersonPermission
{
    public const array ALL = [
        ...LandRequestVoter::ALL,
        ...LandVoter::ALL_PERSON,
        ...LandMemberVoter::ALL_PERSON,
    ];
}
