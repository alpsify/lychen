<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Person;
use App\Factory\PersonFactory;
use GuzzleHttp\Handler\Proxy;
use Symfony\Component\Uid\UuidV4;

trait PersonTrait
{
    protected function createPerson(): Person|Proxy
    {
        return PersonFactory::new()->create(['authId' => UuidV4::v4()]);
    }
}
