<?php

namespace App\Tests\Security;

use App\Tests\Utils\Abstract\AbstractApiTestCase;
use function Zenstruck\Foundry\faker;

class LandSecurityTest extends AbstractApiTestCase
{
    public function testPutDoesNotExist()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);

        $this->browser()->actingAs($owner1)
            ->put('/api/lands/' . $land1->getUlid()->toString())
            ->assertStatus(405);
    }

    public function testUserCantAccessOtherLands()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);

        $owner2 = $this->createPerson();
        $this->createLand($owner2);

        $this->browser()->actingAs($owner2)
            ->get('/api/lands/' . $land1->getUlid()->toString())
            ->assertStatus(403);

        $this->browser()->actingAs($owner2)
            ->patch('/api/lands/' . $land1->getUlid()->toString(), ['json' => ['name' => faker()->name()]])
            ->assertStatus(403);

        $this->browser()->actingAs($owner2)
            ->delete('/api/lands/' . $land1->getUlid()->toString())
            ->assertStatus(403);
    }
}
