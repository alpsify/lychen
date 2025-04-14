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
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

abstract class AbstractLandAwareVoterInterface extends AbstractPermissionVoter implements LandAwareVoterInterface
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

    protected function supports(string $attribute,
                                mixed  $subject,
    ): bool
    {
        $this->currentRequest = $this->requestStack->getCurrentRequest();
        $operation = $this->currentRequest->attributes->get('_api_operation');
        $operationIsPost = $operation instanceof Post;
        $operationIsCollection = $operation instanceof GetCollection;

        $supportsSubject = $subject instanceof ($this->getSupportedClass());
        $supportsAttribute = in_array($attribute, $this->getAvailablePermissions());

        return ($supportsSubject || $operationIsPost || $operationIsCollection) && $supportsAttribute;
    }

    protected function voteOnAttribute(string         $attribute,
                                       mixed          $subject,
                                       TokenInterface $token): bool
    {
        $permissionHolder = $this->getPermissionHolder($subject);

        // Handle standard CRUD operations
        return match ($attribute) {
            static::GET => $this->canGet($permissionHolder, static::GET),
            static::PATCH => $this->canPatch($permissionHolder, static::PATCH),
            static::POST => $this->canPost($permissionHolder, static::POST),
            static::DELETE => $this->canDelete($permissionHolder, static::DELETE),
            static::COLLECTION => $this->canCollection($permissionHolder, static::COLLECTION),
            default => $this->voteOnCustomAttribute($attribute, $subject, $permissionHolder)
        };
    }

    protected function canGet(PermissionHolder $permissionHolder,
                              string           $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canPatch(PermissionHolder $permissionHolder,
                                string           $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canPost(PermissionHolder $permissionHolder,
                               string           $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canDelete(PermissionHolder $permissionHolder,
                                 string           $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canCollection(PermissionHolder $permissionHolder,
                                     string           $permission): bool
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

    /**
     * Handle custom attributes not covered by standard CRUD operations
     * @return bool|null Return bool for handled attributes, null for unhandled ones
     */
    protected function voteOnCustomAttribute(string           $attribute,
                                             mixed            $subject,
                                             PermissionHolder $permissionHolder): bool
    {
        throw new LogicException($attribute . ' is not supported.');
    }
}

