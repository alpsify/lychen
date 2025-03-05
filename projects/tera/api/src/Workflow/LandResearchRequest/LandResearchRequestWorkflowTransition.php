<?php

namespace App\Workflow\LandResearchRequest;

final class LandResearchRequestWorkflowTransition
{
    public const string PUBLISH = 'publish';
    public const string ARCHIVE = 'archive';


    public const array TRANSITIONS = [
        self::PUBLISH,
        self::ARCHIVE,
    ];
}
