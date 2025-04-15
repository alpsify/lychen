<?php

namespace App\Security\Voter;

use App\Security\Interface\LandAwareInterface;

interface LandAwareVoterInterface
{
    /**
     * @return class-string<LandAwareInterface>
     */
    function getSupportedClass(): string;

    function getAvailablePermissions(): array;
}
