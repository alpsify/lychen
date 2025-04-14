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
use App\Security\Interface\LandAwareInterface;
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
            defined('static::GET') ? static::GET : 'not-defined-get' => $this->canGet($subject, $permissionHolder,
                $attribute),
            defined('static::PATCH') ? static::PATCH : 'not-defined-patch' => $this->canPatch($subject,
                $permissionHolder,
                $attribute),
            defined('static::POST') ? static::POST : 'not-defined-post' => $this->canPost($permissionHolder,
                $attribute),
            defined('static::DELETE') ? static::DELETE : 'not-defined-delete' => $this->canDelete($subject,
                $permissionHolder,
                $attribute),
            defined('static::COLLECTION') ? static::COLLECTION : 'not-defined-collection' => $this->canCollection($permissionHolder,
                $attribute),
            default => $this->voteOnCustomAttribute($attribute, $subject, $permissionHolder)
        };
    }

    protected function canGet(LandAwareInterface $subject,
                              PermissionHolder   $permissionHolder,
                              string             $permission): bool
    {
        return $this->canWithLandCheck($subject, $permissionHolder, $permission);
    }

    private function canWithLandCheck(LandAwareInterface $subject = null,
                                      PermissionHolder   $permissionHolder,
                                      string             $permission): bool
    {
        $hasPermission = $this->can($permissionHolder, $permission);
        if ($permissionHolder instanceof LandApiKey && $subject !== null) {
            $belongToLand = $permissionHolder->getLand() === $subject->getLand();
            return $hasPermission && $belongToLand;
        }
        return $hasPermission;
    }

    protected function canPatch(LandAwareInterface $subject,
                                PermissionHolder   $permissionHolder,
                                string             $permission): bool
    {
        return $this->canWithLandCheck($subject, $permissionHolder, $permission);
    }

    protected function canPost(PermissionHolder $permissionHolder,
                               string           $permission): bool
    {
        return $this->can($permissionHolder, $permission);
    }

    protected function canDelete(LandAwareInterface $subject,
                                 PermissionHolder   $permissionHolder,
                                 string             $permission): bool
    {
        return $this->canWithLandCheck($subject, $permissionHolder, $permission);
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

