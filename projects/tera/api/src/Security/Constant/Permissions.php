<?php

namespace App\Security\Constant;

final readonly class Permissions
{
    public const array ALL = [
        ...LandPermission::ALL,
        ...LandAreaPermission::ALL,
        ...LandGreenhousePermission::ALL,
        ...LandAreaParameterPermission::ALL,
        ...LandAreaSettingPermission::ALL,
        ...PlantCustomPermission::ALL,
        ...SeedStockPermission::ALL,
        ...SeedStockEntryPermission::ALL,
        ...LandMemberPermission::ALL,
        ...LandTaskPermission::ALL,
        ...LandCultivationPlanPermission::ALL,
        ...LandRolePermission::ALL,
    ];
}
