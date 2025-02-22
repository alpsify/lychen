<?php

namespace App\Tests\Functionnal\Land;

use App\Constant\LandKind;
use App\Tests\Utils\Abstract\AbstractApiTestCase;
use Zenstruck\Browser\Json;
use function Zenstruck\Foundry\faker;

class LandTest extends AbstractApiTestCase
{
    public function testPost()
    {
        $owner1 = $this->createPerson();
        $this->browser()->actingAs($owner1)
            ->post('/api/lands', ['json' => [
                'name' => faker()->name(),
                'kind' => LandKind::INDIVIDUAL
            ]])
            ->assertStatus(201)
            ->use(function (Json $json) {
                $json->assertThat('defaultRole', fn(Json $json) => $json->isNotNull());
                $json->assertThat('landRoles', fn(Json $json) => $json->hasCount(1));
                $json->assertThat('landMembers', fn(Json $json) => $json->hasCount(1));
            });

    }

    public function testGet()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);
        $this->createLand($owner1);

        $owner2 = $this->createPerson();
        $this->createLand($owner2);

        $this->browser()->actingAs($owner1)
            ->get('/api/lands/' . $land1->getUlid()->toString())
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $land1->getUlid()->toString());
    }

    public function testPatch()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);
        $this->createLand($owner1);

        $newName = faker()->name();

        $this->browser()->actingAs($owner1)
            ->patch('/api/lands/' . $land1->getUlid()->toString(), ['json' => ['name' => faker()->name()]])
            ->assertStatus(200)
            ->assertJsonMatches('ulid', $land1->getUlid()->toString())
            ->assertJsonMatches('name', $newName);
    }

    public function testDelete()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);
        $this->createLand($owner1);

        $this->browser()->actingAs($owner1)
            ->delete('/api/lands/' . $land1->getUlid()->toString())
            ->assertStatus(204);
    }

    public function testGetCollection()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);
        $this->createLand($owner1);

        $owner2 = $this->createPerson();
        $this->createLand($owner2);

        $this->browser()->actingAs($owner1)
            ->get('/api/lands')
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 2)
            ->assertJsonMatches('member[0].ulid', $land1->getUlid()->toString());
    }

    public function testGetCollectionLookingForMember()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);
        $land1->getLandSetting()->setLookingForMember(true);
        $this->createLand($owner1);
        $this->createLand($owner1);

        $owner2 = $this->createPerson();
        $this->createLand($owner2);
        $land2 = $this->createLand($owner2);
        $land2->getLandSetting()->setLookingForMember(true);
        $land2->_save();

        $this->browser()->actingAs($owner1)
            ->get('/api/lands', ['query' => ['looking_for_member' => true]])
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 2)
            ->assertJsonMatches('member[0].ulid', $land1->getUlid()->toString())
            ->assertJsonMatches('member[1].ulid', $land2->getUlid()->toString());
    }
}
