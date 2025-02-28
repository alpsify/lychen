<?php

namespace App\Workflow\LandMemberInvitation;

final class LandMemberInvitationWorkflowPlace
{
    public const string PENDING = 'pending';
    public const string ACCEPTED = 'accepted';
    public const string REFUSED = 'refused';

    public const array PLACES = [
        self::PENDING,
        self::ACCEPTED,
        self::REFUSED,
    ];
}
