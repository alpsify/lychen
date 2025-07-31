<?php

namespace App\Security\Service;


use App\Entity\Person;
use App\Security\Constant\PersonPermission;
use App\Security\Interface\PermissionHolder;
use PHPUnit\Framework\Exception;
use Symfony\Bundle\SecurityBundle\Security;

readonly class PermissionHolderRetriever
{
    public function __construct(private Security $security,
        )
    {
    }

    public function fromContext(PermissionHolderRetrieverContext $context): ?PermissionHolder
    {
        $currentUser = $this->security->getUser();

        if ($currentUser instanceof Person) {
            $currentUser->setPermissions(PersonPermission::ALL);
        }

        if (!$currentUser instanceof PermissionHolder) {
            throw new Exception('No permission holder available for this context');
        }

        return $currentUser;
    }
}
