<?php

namespace App\Security\Voter;

use App\Entity\LandTask;
use App\Security\Interface\PermissionHolder;
use LogicException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LandTaskVoter extends AbstractLandAwareVoter
{

    public const string DELETE = 'land_member:land_task:delete';
    public const string PATCH = 'land_member:land_task:patch';
    public const string POST = 'land_member:land_task:patch';
    public const string GET = 'land_member:land_task:get';
    public const string COLLECTION = 'land_member:land_task:collection';
    public const string MARK_AS_DONE = 'person:land_task:mark_as_done';
    public const string MARK_AS_IN_PROGRESS = 'person:land_task:mark_as_in_progress';

    public const array ALL = [
        self::DELETE,
        self::PATCH,
        self::GET,
        self::COLLECTION,
        self::POST,
        self::MARK_AS_DONE,
        self::MARK_AS_IN_PROGRESS,
    ];

    public const array ALL_PERSON = [];

    public const array ALL_LAND = [
        self::DELETE,
        self::POST,
        self::PATCH,
        self::GET,
        self::COLLECTION,
        self::MARK_AS_DONE,
        self::MARK_AS_IN_PROGRESS,
    ];


    protected function supports(string $attribute, mixed $subject): bool
    {
        return $this->genericSupports($attribute, $subject, self::ALL, LandTask::class);
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $permissionHolder = $this->getPermissionHolder($subject);

        return match ($attribute) {
            self::GET => $this->canGet($permissionHolder, self::GET),
            self::PATCH => $this->canPatch($permissionHolder, self::PATCH),
            self::POST => $this->canPatch($permissionHolder, self::POST),
            self::DELETE => $this->canDelete($permissionHolder, self::DELETE),
            self::COLLECTION => $this->canCollection($permissionHolder, self::COLLECTION),
            self::MARK_AS_DONE => $this->canMarkAsDone($subject, $permissionHolder),
            self::MARK_AS_IN_PROGRESS => $this->canMarkAsInProgress($subject, $permissionHolder),
            default => throw new LogicException($attribute . ' is not supported.')
        };
    }

    private function canMarkAsDone(LandTask $landTask, PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::MARK_AS_DONE);
    }

    private function canMarkAsInProgress(LandTask $landTask, PermissionHolder $permissionHolder): bool
    {
        return $this->can($permissionHolder, self::MARK_AS_IN_PROGRESS);
    }
}
