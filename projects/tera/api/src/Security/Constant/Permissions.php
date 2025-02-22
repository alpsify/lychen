<?php

namespace App\Security\Constant;

final readonly class Permissions
{
    public const array ALL = [
        ...LandPermission::ALL,
        ...LandAreaPermission::ALL,
        ...LandGreenhousePermission::ALL
    ];
}
