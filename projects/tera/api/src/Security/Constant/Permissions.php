<?php

namespace App\Security\Constant;

final readonly class Permissions
{
    public const array ALL = [
        ...LandPermission::ALL,
        ...LandAreaPermission::ALL,
        ...LandAreaParameterPermission::ALL,
        ...LandAreaSettingPermission::ALL,
        ...LandGreenhousePermission::ALL,
        ...LandGreenhouseParameterPermission::ALL,
        ...LandGreenhouseSettingPermission::ALL,
        ...PlantCustomPermission::ALL,
        ...SeedStockPermission::ALL,
        ...SeedStockEntryPermission::ALL,
        ...LandMemberPermission::ALL,
        ...LandTaskPermission::ALL,
        ...LandCultivationPlanPermission::ALL,
        ...LandRolePermission::ALL,
        ...LandMemberInvitationPermission::ALL,
        ...LandSettingPermission::ALL,
    ];


    public const array LAND_MEMBER_RELATED = [
        ...LandPermission::ALL,
        ...LandGreenhousePermission::ALL,
        ...LandGreenhouseParameterPermission::ALL,
        ...LandGreenhouseSettingPermission::ALL,
        ...LandAreaPermission::ALL,
        ...LandAreaParameterPermission::ALL,
        ...LandAreaSettingPermission::ALL,
        ...LandMemberPermission::ALL,
        ...LandTaskPermission::ALL,
        ...LandCultivationPlanPermission::ALL,
        ...LandRolePermission::ALL,
        ...LandMemberInvitationPermission::LAND_MEMBER_RELATED,
        ...LandSettingPermission::ALL,
    ];
}
