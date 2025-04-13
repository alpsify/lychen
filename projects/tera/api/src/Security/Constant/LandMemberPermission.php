<?php

namespace App\Security\Constant;

use App\Security\Voter\LandMemberVoter;
use App\Security\Voter\LandVoter;

final class LandMemberPermission
{
    public const string PREFIX = 'land';

    public const array ALL = [
        ...LandVoter::ALL_LAND,
        ...LandMemberVoter::ALL_LAND,
    ];
}
