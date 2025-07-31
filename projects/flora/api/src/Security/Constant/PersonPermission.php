<?php

namespace App\Security\Constant;

use App\Security\Voter\PersonApiKeyVoter;

final readonly class PersonPermission
{
    public const array ALL = [
        ...PersonApiKeyVoter::ALL_PERSON,
    ];
}
