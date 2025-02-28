<?php

namespace App\Workflow\LandMemberInvitation;

final class LandMemberInvitationWorkflowTransition
{
    public const string ACCEPT = 'accept';
    public const string REFUSE = 'refuse';

    public const array TRANSITIONS = [
        self::ACCEPT,
        self::REFUSE,
    ];
}
