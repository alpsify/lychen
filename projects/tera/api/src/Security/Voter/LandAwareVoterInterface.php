<?php

namespace App\Security\Voter;

interface LandAwareVoterInterface
{
    function getSupportedClass(): string;

    function getAvailablePermissions(): array;
}
