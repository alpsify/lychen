<?php

namespace App\Security\Voter;

use App\Entity\LandMemberInvitation;
use App\Security\Constant\LandMemberInvitationPermission;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class LandMemberInvitationVoter extends Voter
{

    public function __construct()
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        $subjectIsLandAware = $subject instanceof LandMemberInvitation;
        $attributeIsSupported = in_array($attribute, [LandMemberInvitationPermission::ACCEPT, LandMemberInvitationPermission::REFUSE]);

        return $subjectIsLandAware && $attributeIsSupported;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        if ($subject->getEmail() === $token->getUser()->getEmail()) {
            return true;
        }

        return false;
    }
}
