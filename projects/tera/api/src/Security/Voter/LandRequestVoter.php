<?php

namespace App\Security\Voter;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Entity\LandRequest;
use App\Entity\PersonApiKey;
use App\Security\Checker\LandMemberPermissionChecker;
use App\Security\Checker\PersonApiKeyPermissionChecker;
use App\Security\Checker\PersonPermissionChecker;
use App\Security\Interface\PermissionHolder;
use App\Security\Service\PermissionHolderRetriever;
use App\Workflow\LandRequest\LandRequestWorkflowPlace;
use LogicException;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LandRequestVoter extends AbstractPermissionVoter
{
    public const string POST = 'person:land_request:post';
    public const string PATCH = 'person:land_request:patch';
    public const string GET = 'person:land_request:get';
    public const string COLLECTION = 'person:land_request:collection';
    public const string COLLECTION_PUBLIC = 'person:land_request:collection_public';
    public const string DELETE = 'person:land_request:delete';
    public const string PUBLISH = 'person:land_request:publish';
    public const string ARCHIVE = 'person:land_request:archive';

    public const array ALL = [
        self::POST,
        self::PATCH,
        self::DELETE,
        self::PUBLISH,
        self::ARCHIVE,
        self::GET,
        self::COLLECTION,
        self::COLLECTION_PUBLIC,
    ];

    public function __construct(
        PermissionHolderRetriever     $permissionHolderRetriever,
        PersonApiKeyPermissionChecker $personApiKeyPermissionChecker,
        PersonPermissionChecker       $personPermissionChecker,
        LandMemberPermissionChecker   $landMemberPermissionChecker,
        private readonly RequestStack $requestStack)
    {
        parent::__construct($permissionHolderRetriever, $personApiKeyPermissionChecker, $personPermissionChecker, $landMemberPermissionChecker);
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        $currentRequest = $this->requestStack->getCurrentRequest();
        $operation = $currentRequest->attributes->get('_api_operation');
        $operationIsPost = $operation instanceof Post;
        $operationIsCollection = $operation instanceof GetCollection;

        $supportsSubject = $subject instanceof LandRequest;
        $supportsAttribute = in_array($attribute, self::ALL);

        return ($supportsSubject || $operationIsPost || $operationIsCollection) && $supportsAttribute;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $permissionHolder = $this->getPermissionHolder($subject);

        return match ($attribute) {
            self::GET => $this->canGet($subject, $permissionHolder),
            self::POST => $this->canPost($permissionHolder),
            self::PATCH => $this->canPatch($subject, $permissionHolder),
            self::DELETE => $this->canDelete($subject, $permissionHolder),
            self::PUBLISH => $this->canPublish($subject, $permissionHolder),
            self::ARCHIVE => $this->canArchive($subject, $permissionHolder),
            self::COLLECTION => $this->canCollection($permissionHolder),
            self::COLLECTION_PUBLIC => $this->canCollectionPublic($permissionHolder),
            default => throw new LogicException($attribute . ' is not supported.')
        };
    }

    private function canGet(LandRequest $landRequest, PermissionHolder $permissionHolder): bool
    {
        $hasPermission = $this->can($permissionHolder, self::GET);

        if (!$hasPermission) {
            return false;
        }

        if ($permissionHolder instanceof PersonApiKey) {
            $isOnBehalfOfUser = $landRequest->getPerson() === $permissionHolder->getPerson();
            return $isOnBehalfOfUser;
        }

        $userIsOwner = $landRequest->getPerson() === $permissionHolder;
        $userIsNotOwnerButStateIsPublished = $landRequest->getPerson() !== $permissionHolder && $landRequest->getState() === LandRequestWorkflowPlace::PUBLISHED;

        return $userIsOwner || $userIsNotOwnerButStateIsPublished;
    }

    private function canPost($permissionHolder): bool
    {
        return $this->can($permissionHolder, self::POST);
    }

    private function canPatch(LandRequest $landRequest, PermissionHolder $permissionHolder): bool
    {
        $hasPermission = $this->can($permissionHolder, self::PATCH);

        if (!$hasPermission) {
            return false;
        }

        if ($permissionHolder instanceof PersonApiKey) {
            $isOnBehalfOfUser = $landRequest->getPerson() === $permissionHolder->getPerson();
            return $isOnBehalfOfUser;
        }

        $userIsOwner = $landRequest->getPerson() === $permissionHolder;
        $stateIsDraft = $landRequest->getState() === LandRequestWorkflowPlace::DRAFT;

        return $userIsOwner && $stateIsDraft;
    }

    private function canDelete(LandRequest $landRequest, PermissionHolder $permissionHolder): bool
    {
        $hasPermission = $this->can($permissionHolder, self::DELETE);

        if (!$hasPermission) {
            return false;
        }

        if ($permissionHolder instanceof PersonApiKey) {
            $isOnBehalfOfUser = $landRequest->getPerson() === $permissionHolder->getPerson();
            return $isOnBehalfOfUser;
        }

        $userIsOwner = $landRequest->getPerson() === $permissionHolder;
        $stateIsDraft = $landRequest->getState() === LandRequestWorkflowPlace::DRAFT;

        return $userIsOwner && $stateIsDraft;
    }

    private function canPublish(LandRequest $landRequest, PermissionHolder $permissionHolder): bool
    {
        $hasPermission = $this->can($permissionHolder, self::PUBLISH);

        if (!$hasPermission) {
            return false;
        }

        if ($permissionHolder instanceof PersonApiKey) {
            $isOnBehalfOfUser = $landRequest->getPerson() === $permissionHolder->getPerson();
            return $isOnBehalfOfUser;
        }

        $userIsOwner = $landRequest->getPerson() === $permissionHolder;
        $stateIsDraft = $landRequest->getState() === LandRequestWorkflowPlace::DRAFT;

        return $userIsOwner && $stateIsDraft;
    }

    private function canArchive(LandRequest $landRequest, PermissionHolder $permissionHolder): bool
    {
        $hasPermission = $this->can($permissionHolder, self::ARCHIVE);

        if (!$hasPermission) {
            return false;
        }

        if ($permissionHolder instanceof PersonApiKey) {
            $isOnBehalfOfUser = $landRequest->getPerson() === $permissionHolder->getPerson();
            return $isOnBehalfOfUser;
        }

        $userIsOwner = $landRequest->getPerson() === $permissionHolder;
        $stateIsPublished = $landRequest->getState() === LandRequestWorkflowPlace::PUBLISHED;

        return $userIsOwner && $stateIsPublished;
    }

    private function canCollection(PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::COLLECTION);
    }

    private function canCollectionPublic(PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::COLLECTION_PUBLIC);
    }

}
