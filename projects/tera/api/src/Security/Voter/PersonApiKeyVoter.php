<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class PersonApiKeyVoter extends AbstractPermissionVoter
{

    public const string DELETE = 'person:person_api_key:delete';
    public const string POST = 'person:person_api_key:post';
    public const string GET = 'person:person_api_key:get';
    public const string COLLECTION = 'person:person_api_key:collection';

    public const array ALL = [
        self::DELETE,
        self::GET,
        self::COLLECTION,
        self::POST,
    ];

    public const array ALL_PERSON = [
        self::DELETE,
        self::POST,
        self::GET,
        self::COLLECTION,
    ];

    public const array ALL_LAND = [

    ];

    protected function supports(string $attribute,
                                mixed  $subject): bool
    {
        // TODO: Implement supports() method.
    }

    protected function voteOnAttribute(string         $attribute,
                                       mixed          $subject,
                                       TokenInterface $token): bool
    {
        // TODO: Implement voteOnAttribute() method.
    }
}

