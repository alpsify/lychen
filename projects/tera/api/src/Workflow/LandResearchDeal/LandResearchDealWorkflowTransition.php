<?php

namespace App\Workflow\LandResearchDeal;

final class LandResearchDealWorkflowTransition
{
    public const string ARCHIVE = 'archive';
    public const string ACCEPT = 'accept';
    public const string REFUSE = 'refuse';

    public const array TRANSITIONS = [
        self::ARCHIVE,
        self::ACCEPT,
        self::REFUSE,
    ];
}
