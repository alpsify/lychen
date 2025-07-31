<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Person;
use App\Entity\PersonApiKey;
use App\Factory\PersonApiKeyFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait PersonApiKeyTrait
{
    protected function createPersonApiKey(Person $person, array|callable $attributes = [], array $excludedPermissions = []): PersonApiKey|Proxy
    {
        if ($attributes['permissions'] && $excludedPermissions) {
            $attributes['permissions'] = array_diff($attributes['permissions'], $excludedPermissions);
        }
        return PersonApiKeyFactory::new()->create(array_merge(['person' => $person], $attributes));
    }
}
