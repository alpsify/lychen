<?php

namespace App\Security\Voter;

use App\Security\Constant\Permissions;
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
        $attributeIsSupported = in_array($attribute, Permissions::ALL);

        return $subjectIsLandAware && $attributeIsSupported;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        return $this->permissionManager->can($attribute, $subject);
    }
}
