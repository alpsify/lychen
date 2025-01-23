<?php

namespace App\Tests\Functionnal\Land;

use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandTest extends AbstractApiTestCase
{
    public function testGetLands()
    {
        static::createClient()->request('GET', '/api/lands');
        $this->assertResponseStatusCodeSame(200);
    }
}
