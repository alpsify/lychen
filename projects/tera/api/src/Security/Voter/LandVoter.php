<?php

namespace App\Security\Voter;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Entity\Land;
use App\Entity\LandApiKey;
use App\Security\Checker\LandMemberPermissionChecker;
use App\Security\Checker\PersonApiKeyPermissionChecker;
use App\Security\Checker\PersonPermissionChecker;
use App\Security\Interface\PermissionHolder;
use App\Security\Service\PermissionHolderRetriever;
use Exception;
use Symfony\Component\Cache\Exception\LogicException;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LandVoter extends AbstractPermissionVoter
{
    public const string POST = 'person:land:post';
    public const string DELETE = 'land_member:land:delete';
    public const string PATCH = 'land_member:land:patch';
    public const string GET = 'land_member:land:get';
    public const string COLLECTION = 'person:land:collection';

    public const array ALL = [
        self::POST,
        self::DELETE,
        self::PATCH,
        self::GET,
        self::COLLECTION,
    ];

    public const array ALL_PERSON = [
        self::POST,
        self::COLLECTION,
    ];

    public const array ALL_LAND = [
        self::DELETE,
        self::PATCH,
        self::GET,
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

        $supportsSubject = $subject instanceof Land;
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
            self::COLLECTION => $this->canCollection($permissionHolder),
            default => throw new LogicException($attribute . ' is not supported.')
        };
    }

    private function canGet(Land $land, PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::GET);
    }

    private function canPost(PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::POST);
    }

    private function canPatch(Land $land, PermissionHolder $permissionHolder): bool
    {
        if ($permissionHolder instanceof LandApiKey) {
            $hasPermission = $this->can($permissionHolder, self::PATCH);

            if (!$hasPermission) {
                return false;
            }

            return $land === $permissionHolder->getLand();
        }

        try {
            $landMember = $this->permissionHolderRetriever->getLandMember($land, $permissionHolder);
        } catch (Exception) {
            return false;
        }

        return $this->can($landMember, self::PATCH);
    }

    private function canDelete(Land $land, PermissionHolder $permissionHolder): bool
    {
        if ($permissionHolder instanceof LandApiKey) {
            $hasPermission = $this->can($permissionHolder, self::DELETE);

            if (!$hasPermission) {
                return false;
            }

            return $land === $permissionHolder->getLand();
        }

        try {
            $landMember = $this->permissionHolderRetriever->getLandMember($land, $permissionHolder);
        } catch (Exception) {
            return false;
        }

        return $this->can($landMember, self::DELETE);
    }

    private function canCollection(PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::COLLECTION);
    }
}
