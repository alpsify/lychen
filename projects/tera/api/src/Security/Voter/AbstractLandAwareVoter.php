<?php

namespace App\Security\Voter;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\IriConverterInterface;
use ApiPlatform\Metadata\Post;
use App\Entity\Land;
use App\Entity\LandApiKey;
use App\Security\Checker\LandApiKeyPermissionChecker;
use App\Security\Checker\LandMemberPermissionChecker;
use App\Security\Checker\PersonApiKeyPermissionChecker;
use App\Security\Checker\PersonPermissionChecker;
use App\Security\Interface\PermissionHolder;
use App\Security\Service\PermissionHolderRetriever;
use Exception;
use LogicException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class AbstractLandAwareVoter extends AbstractPermissionVoter
{

    protected Request|null $currentRequest = null;

    public function __construct(PermissionHolderRetriever                $permissionHolderRetriever,
                                PersonApiKeyPermissionChecker            $personApiKeyPermissionChecker,
                                LandApiKeyPermissionChecker              $landApiKeyPermissionChecker,
                                PersonPermissionChecker                  $personPermissionChecker,
                                LandMemberPermissionChecker              $landMemberPermissionChecker,
                                RequestStack                             $requestStack,
                                protected readonly IriConverterInterface $iriConverter)
    {
        parent::__construct($permissionHolderRetriever, $personApiKeyPermissionChecker, $landApiKeyPermissionChecker,
            $personPermissionChecker, $landMemberPermissionChecker, $requestStack);
    }

    protected function genericSupports(string $attribute, mixed $subject, array $permissions, $class): bool
    {
        $this->currentRequest = $this->requestStack->getCurrentRequest();
        $operation = $this->currentRequest->attributes->get('_api_operation');
        $operationIsPost = $operation instanceof Post;
        $operationIsCollection = $operation instanceof GetCollection;

        $supportsSubject = $subject instanceof $class;
        $supportsAttribute = in_array($attribute, $permissions);

        return ($supportsSubject || $operationIsPost || $operationIsCollection) && $supportsAttribute;
    }

    protected function canCollection(PermissionHolder $permissionHolder, string $permission): bool
    {
        if ($permissionHolder instanceof LandApiKey) {
            return $this->can($permissionHolder, $permission);
        }

        $land = $this->iriConverter->getResourceFromIri($this->currentRequest->query->get('land'));

        if (!$land instanceof Land) {
            throw new LogicException('Land not found.');
        }

        try {
            $landMember = $this->permissionHolderRetriever->getLandMember($land, $permissionHolder);
        } catch (Exception $exception) {
            throw new HttpException(403, $exception->getMessage());
        }

        return $this->can($landMember, $permission);
    }

    protected function canGet(PermissionHolder $permissionHolder, string $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canPatch(PermissionHolder $permissionHolder, string $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canDelete(PermissionHolder $permissionHolder, string $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canPost(PermissionHolder $permissionHolder, string $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }
}
