<?php

namespace App\Security\Voter;

use App\Security\Helper\PermissionManager;
use App\Security\Interface\LandAwareInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class LandAwareVoter extends Voter
{

    public function __construct(private readonly PermissionManager $permissionManager)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        $subjectIsLandAware = $subject instanceof LandAwareInterface;

        return $subjectIsLandAware;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $requiredPermission = $this->permissionManager->buildPermissionFromContext($attribute, $subject);

        return $this->permissionManager->can($requiredPermission, $subject);
    }
}
