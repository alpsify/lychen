<?php

namespace App\Security\Voter;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\IriConverterInterface;
use ApiPlatform\Metadata\Post;
use App\Entity\Land;
use App\Entity\LandApiKey;
use App\Entity\LandMember;
use App\Entity\PersonApiKey;
use App\Security\Checker\LandApiKeyPermissionChecker;
use App\Security\Checker\LandMemberPermissionChecker;
use App\Security\Checker\PersonApiKeyPermissionChecker;
use App\Security\Checker\PersonPermissionChecker;
use App\Security\Interface\PermissionHolder;
use App\Security\Service\PermissionHolderRetriever;
use Symfony\Component\Cache\Exception\LogicException;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LandMemberVoter extends AbstractPermissionVoter
{
    public const string DELETE = 'land_member:land:delete';
    public const string PATCH = 'land_member:land:patch';
    public const string GET = 'land_member:land:get';
    public const string COLLECTION = 'land_member:land:collection';
    public const string ME = 'person:land:me';

    public const array ALL = [
        self::DELETE,
        self::PATCH,
        self::GET,
        self::COLLECTION,
        self::ME,
    ];

    public const array ALL_PERSON = [
        self::ME,
    ];

    public const array ALL_LAND = [
        self::DELETE,
        self::PATCH,
        self::GET,
        self::COLLECTION,
    ];

    public function __construct(PermissionHolderRetriever $permissionHolderRetriever, PersonApiKeyPermissionChecker $personApiKeyPermissionChecker, LandApiKeyPermissionChecker $landApiKeyPermissionChecker, PersonPermissionChecker $personPermissionChecker, LandMemberPermissionChecker $landMemberPermissionChecker, RequestStack $requestStack, private readonly IriConverterInterface $iriConverter)
    {
        parent::__construct($permissionHolderRetriever, $personApiKeyPermissionChecker, $landApiKeyPermissionChecker, $personPermissionChecker, $landMemberPermissionChecker, $requestStack);
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        $currentRequest = $this->requestStack->getCurrentRequest();
        $operation = $currentRequest->attributes->get('_api_operation');
        $operationIsPost = $operation instanceof Post;
        $operationIsCollection = $operation instanceof GetCollection;
        $operationIsGetMe = $operation instanceof Get && $operation->getName() === 'get-me';

        $supportsSubject = $subject instanceof LandMember;
        $supportsAttribute = in_array($attribute, self::ALL);

        return ($supportsSubject || $operationIsPost || $operationIsCollection || $operationIsGetMe) && $supportsAttribute;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $permissionHolder = $this->getPermissionHolder($subject);

        return match ($attribute) {
            self::GET => $this->canGet($subject, $permissionHolder),
            self::PATCH => $this->canPatch($subject, $permissionHolder),
            self::DELETE => $this->canDelete($subject, $permissionHolder),
            self::COLLECTION => $this->canCollection($permissionHolder),
            self::ME => $this->canMe($permissionHolder),
            default => throw new LogicException($attribute . ' is not supported.')
        };
    }

    private function canGet(LandMember $landMember, PermissionHolder $permissionHolder): bool
    {
        if ($landMember === $permissionHolder) {
            return true;
        }

        return $this->can($permissionHolder, self::GET);
    }

    private function canPatch(LandMember $landMember, PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::PATCH);
    }

    private function canDelete(LandMember $landMember, PermissionHolder $permissionHolder): bool
    {
        if ($landMember->isOwner()) {
            return false;
        }

        if ($landMember === $permissionHolder) {
            return true;
        }

        return $this->can($permissionHolder, self::DELETE);
    }

    private function canCollection(PermissionHolder $permissionHolder): bool
    {
        if ($permissionHolder instanceof LandApiKey) {
            return $this->can($permissionHolder, self::COLLECTION);
        }

        $currentRequest = $this->requestStack->getCurrentRequest();
        $land = $this->iriConverter->getResourceFromIri($currentRequest->query->get('land'));

        if (!$land instanceof Land) {
            throw new LogicException('Land not found.');
        }

        $landMember = $this->permissionHolderRetriever->getLandMember($land, $permissionHolder);

        return $this->can($landMember, self::COLLECTION);
    }

    private function canMe(PermissionHolder $permissionHolder): bool
    {
        if ($permissionHolder instanceof PersonApiKey) {
            $permissionHolder = $permissionHolder->getPerson();
        }

        $currentRequest = $this->requestStack->getCurrentRequest();
        $land = $this->iriConverter->getResourceFromIri($currentRequest->query->get('land'));

        if (!$land instanceof Land) {
            throw new LogicException('Land not found.');
        }

        return $this->can($permissionHolder, self::ME);
    }
}
