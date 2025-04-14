<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class LandMemberInvitationVoter extends AbstractPermissionVoter
{
    public const string DELETE = 'land_member:land_member:delete';
    public const string PATCH = 'land_member:land_member:patch';
    public const string GET = 'land_member:land_member:get';
    public const string COLLECTION = 'land_member:land_member:collection';
    public const string CHECK_EMAIl_UNICITY = 'land_member:land_member:check_email_unicity';
    public const string COLLECTION_BY_EMAIL = 'person:land_member:collection';
    public const string ACCEPT = 'person:land_member_invitation:accept';
    public const string REFUSE = 'person:land_member_invitation:refuse';

    public const array ALL = [
        self::DELETE,
        self::PATCH,
        self::GET,
        self::COLLECTION,
    ];

    public const array ALL_PERSON = [
        self::ACCEPT,
        self::REFUSE,
        self::COLLECTION_BY_EMAIL,
    ];

    public const array ALL_LAND = [
        self::DELETE,
        self::PATCH,
        self::GET,
        self::COLLECTION,
        self::CHECK_EMAIl_UNICITY,
    ];

    protected function supports(string $attribute,
                                mixed  $subject): bool
    {
        return false;
    }

    protected function voteOnAttribute(string         $attribute,
                                       mixed          $subject,
                                       TokenInterface $token): bool
    {
        return false;
    }
}
