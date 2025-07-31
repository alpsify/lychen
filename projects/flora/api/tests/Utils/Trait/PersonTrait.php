<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Person;
use App\Factory\PersonFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait PersonTrait
{
    protected function createPerson(array|callable $attributes = []): Person|Proxy
    {
        return PersonFactory::new()->create($attributes);
    }
}
