<?php

namespace App\Security\Voter;

use App\Entity\SeedStock;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class SeedStockVoter extends Voter
{

    protected function supports(string $attribute, mixed $subject): bool
    {
        $isSupported = $subject instanceof SeedStock;

        return $isSupported;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        return false;
    }
}
