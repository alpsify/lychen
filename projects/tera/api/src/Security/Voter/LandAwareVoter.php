<?php

namespace App\Security\Voter;

use App\Security\Constant\Permissions;
use App\Security\Interface\LandAwareInterface;
use App\Security\Service\PermissionManager;
use JetBrains\PhpStorm\Deprecated;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

#[Deprecated]
class LandAwareVoter extends Voter
{

    public function __construct(private readonly PermissionManager $permissionManager)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        $subjectIsLandAware = $subject instanceof LandAwareInterface;
        $attributeIsSupported = in_array($attribute, Permissions::LAND_MEMBER_RELATED);

        return $subjectIsLandAware && $attributeIsSupported;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        return $this->permissionManager->can($attribute, $subject);
    }
}
