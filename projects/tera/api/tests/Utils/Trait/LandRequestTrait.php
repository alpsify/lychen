<?php

namespace App\Tests\Utils\Trait;


use App\Entity\LandRequest;
use App\Entity\Person;
use App\Factory\LandRequestFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandRequestTrait
{
    protected function createLandRequest(Person|Proxy $person, ?array $attributes = null): LandRequest|Proxy
    {
        return LandRequestFactory::new()->create(array_merge([
            'person' => $person
        ], $attributes ?? []));
    }
}
