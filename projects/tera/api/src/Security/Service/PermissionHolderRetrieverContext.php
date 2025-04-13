<?php

namespace App\Security\Service;

class PermissionHolderRetrieverContext
{
    public function __construct(public mixed $subject)
    {
    }
}
