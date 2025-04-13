<?php

namespace App\Security\Voter;

use App\Entity\LandMember;
use App\Entity\Person;
use App\Entity\PersonApiKey;
use App\Security\Checker\LandMemberPermissionChecker;
use App\Security\Checker\PersonApiKeyPermissionChecker;
use App\Security\Checker\PersonPermissionChecker;
use App\Security\Interface\PermissionHolder;
use App\Security\Service\PermissionHolderRetriever;
use App\Security\Service\PermissionHolderRetrieverContext;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

abstract class AbstractPermissionVoter extends Voter
{
    public function __construct(
        protected readonly PermissionHolderRetriever     $permissionHolderRetriever,
        protected readonly PersonApiKeyPermissionChecker $personApiKeyPermissionChecker,
        protected readonly PersonPermissionChecker       $personPermissionChecker,
        protected readonly LandMemberPermissionChecker   $landMemberPermissionChecker,
    )
    {
    }

    protected function getPermissionHolder(mixed $subject): PermissionHolder
    {
        return $this->permissionHolderRetriever->fromContext(new PermissionHolderRetrieverContext(['subject' => $subject]));
    }

    protected function can(PermissionHolder $permissionHolder, string $permission): bool
    {
        if ($permissionHolder instanceof PersonApiKey) {
            return $this->personApiKeyPermissionChecker->can($permissionHolder, $permission);
        }

        if ($permissionHolder instanceof Person) {
            return $this->personPermissionChecker->can($permissionHolder, $permission);
        }

        if ($permissionHolder instanceof LandMember) {
            return $this->landMemberPermissionChecker->can($permissionHolder, $permission);
        }

        return false;
    }
}
