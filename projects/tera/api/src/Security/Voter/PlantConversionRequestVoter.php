<?php

namespace App\Security\Voter;

use App\Entity\PlantConversionRequest;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PlantConversionRequestVoter extends Voter
{

    protected function supports(string $attribute, mixed $subject): bool
    {
        $isSupported = $subject instanceof PlantConversionRequest;

        return $isSupported;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        return false;
    }
}
