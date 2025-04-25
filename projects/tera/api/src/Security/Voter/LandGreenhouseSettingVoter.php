<?php

namespace App\Security\Voter;

use App\Entity\LandGreenhouseSetting;

class LandGreenhouseSettingVoter extends AbstractLandAwareVoterInterface
{
    public const string PATCH = 'land_member:land_greenhouse_setting:patch';
    public const string GET = 'land_member:land_greenhouse_setting:get';

    public const array ALL = [
        self::PATCH,
        self::GET,
    ];

    public const array ALL_PERSON = [];

    public const array ALL_LAND = [
        self::PATCH,
        self::GET,
    ];

    function getSupportedClass(): string
    {
        return LandGreenhouseSetting::class;
    }

    function getAvailablePermissions(): array
    {
        return self::ALL;
    }
}

