<?php

namespace App\Security\Constant;

use App\Security\Voter\LandAreaParameterVoter;
use App\Security\Voter\LandAreaSettingVoter;
use App\Security\Voter\LandAreaVoter;
use App\Security\Voter\LandCultivationPlanVoter;
use App\Security\Voter\LandGreenhouseParameterVoter;
use App\Security\Voter\LandGreenhouseSettingVoter;
use App\Security\Voter\LandGreenhouseVoter;
use App\Security\Voter\LandMemberInvitationVoter;
use App\Security\Voter\LandMemberVoter;
use App\Security\Voter\LandSettingVoter;
use App\Security\Voter\LandTaskVoter;
use App\Security\Voter\LandVoter;

final class LandMemberPermission
{
    public const array ALL = [
        ...LandVoter::ALL_LAND,
        ...LandMemberVoter::ALL_LAND,
        ...LandTaskVoter::ALL_LAND,
        ...LandAreaVoter::ALL_LAND,
        ...LandAreaSettingVoter::ALL_LAND,
        ...LandAreaParameterVoter::ALL_LAND,
        ...LandSettingVoter::ALL_LAND,
        ...LandGreenhouseVoter::ALL_LAND,
        ...LandGreenhouseSettingVoter::ALL_LAND,
        ...LandGreenhouseParameterVoter::ALL_LAND,
        ...LandCultivationPlanVoter::ALL_LAND,
        ...LandMemberInvitationVoter::ALL_LAND
    ];
}
