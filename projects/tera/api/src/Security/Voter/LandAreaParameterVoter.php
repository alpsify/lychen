<?php

namespace App\Security\Voter;

use App\Entity\LandAreaParameter;

class LandAreaParameterVoter extends AbstractLandAwareVoterInterface
{
    public const string PATCH = 'land_member:land_area_parameter:patch';
    public const string GET = 'land_member:land_area_parameter:get';

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
        return LandAreaParameter::class;
    }

    function getAvailablePermissions(): array
    {
        return self::ALL;
    }
}

