<?php

namespace App\Workflow\LandResearchDeal;

final class LandResearchDealWorkflowPlace
{
    public const string OPENED = 'opened';
    public const string ARCHIVED = 'archived';
    public const string ACCEPTED = 'accepted';
    public const string REFUSED = 'refused';

    public const array PLACES = [
        self::OPENED,
        self::ARCHIVED,
        self::ACCEPTED,
        self::REFUSED,
    ];
}
