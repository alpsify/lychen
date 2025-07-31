<?php

namespace App\Security\Voter;

use App\Entity\LandApiKey;
use App\Entity\LandMember;
use App\Entity\Person;
use App\Entity\PersonApiKey;
use App\Security\Checker\PersonApiKeyPermissionChecker;
use App\Security\Checker\PersonPermissionChecker;
use App\Security\Interface\PermissionHolder;
use App\Security\Service\PermissionHolderRetriever;
use App\Security\Service\PermissionHolderRetrieverContext;
use Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

abstract class AbstractPermissionVoter extends Voter
{
    public function __construct(
        protected readonly PermissionHolderRetriever $permissionHolderRetriever,
        protected readonly PersonApiKeyPermissionChecker $personApiKeyPermissionChecker,
        protected readonly PersonPermissionChecker $personPermissionChecker,
        protected readonly RequestStack $requestStack
    )
    {
    }

    protected function getPermissionHolder(mixed $subject): PermissionHolder
    {
        try {
            return $this->permissionHolderRetriever->fromContext(new PermissionHolderRetrieverContext($subject));
        } catch (Exception $exception) {
            throw new HttpException(403, $exception->getMessage());
        }
    }

    protected function can(PermissionHolder $permissionHolder, string $permission): bool
    {
        if ($permissionHolder instanceof PersonApiKey) {
            return $this->personApiKeyPermissionChecker->can($permissionHolder, $permission);
        }

        if ($permissionHolder instanceof Person) {
            return $this->personPermissionChecker->can($permissionHolder, $permission);
        }

        return false;
    }
}
