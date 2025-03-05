<?php

namespace App\Workflow\LandResearchRequest;

final class LandResearchRequestWorkflowPlace
{
    public const string DRAFT = 'draft';
    public const string PUBLISHED = 'published';
    public const string ARCHIVED = 'archived';


    public const array PLACES = [
        self::DRAFT,
        self::PUBLISHED,
        self::ARCHIVED,
    ];
}
