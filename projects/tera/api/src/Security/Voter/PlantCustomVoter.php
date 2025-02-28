<?php

namespace App\Security\Voter;

use App\Entity\PlantCustom;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PlantCustomVoter extends Voter
{

    protected function supports(string $attribute, mixed $subject): bool
    {
        $isSupported = $subject instanceof PlantCustom;

        return $isSupported;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        return false;
    }
}
