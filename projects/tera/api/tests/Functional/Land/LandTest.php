<?php

namespace App\Tests\Functional\Land;

use App\Tests\Utils\Abstract\AbstractApiTestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Zenstruck\Browser\Json;
use function Zenstruck\Foundry\faker;

class LandTest extends AbstractApiTestCase
{
    #[DataProvider('landDataProvider')]
    public function testPost(int $surface, string $kind)
    {
        $owner1 = $this->createPerson();

        $name = faker()->name();

        $this->browser()->actingAs($owner1)
            ->post('/api/lands', ['json' => [
                'name' => $name,
                'kind' => $kind,
                'surface' => $surface
            ]])
            ->assertStatus(201)
            ->assertJsonMatches('name', $name)
            ->assertJsonMatches('kind', $kind)
            ->assertJsonMatches('surface', $surface)
            ->use(function (Json $json) {
                $json->assertThat('ulid', fn(Json $json) => $json->isNotNull());
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
            ->assertJsonMatches('ulid', $land1->getUlid()->toString())
            ->assertJsonMatches('name', $land1->getName())
            ->assertJsonMatches('kind', $land1->getKind())
            ->assertJsonMatches('surface', $land1->getSurface())
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNull());
            });
    }

    public function testPatch()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);
        $this->createLand($owner1);

        $newName = faker()->name();
        $newSurface = faker()->numberBetween(10, 200);

        $this->browser()->actingAs($owner1)
            ->patch('/api/lands/' . $land1->getUlid()->toString(), [
                'json' => [
                    'name' => $newName,
                    'surface' => $newSurface
                ]
            ])
            ->assertStatus(200)
            ->assertJsonMatches('ulid', $land1->getUlid()->toString())
            ->assertJsonMatches('name', $newName)
            ->assertJsonMatches('kind', $land1->getKind())
            ->assertJsonMatches('surface', $newSurface)
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNotNull());
            });
    }

    public function testPatchWithInvalidSurface()
    {
        $owner1 = $this->createPerson();
        $land1 = $this->createLand($owner1);

        $this->browser()->actingAs($owner1)
            ->patch('/api/lands/' . $land1->getUlid()->toString(), [
                'json' => [
                    'surface' => -1 // Invalid surface
                ]
            ])
            ->assertStatus(422);
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

    public function testCollection()
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
            ->assertJsonMatches('member[0].ulid', $land1->getUlid()->toString())
            ->assertJsonMatches('member[0].name', $land1->getName())
            ->assertJsonMatches('member[0].surface', $land1->getSurface());
    }

    public function testCollectionPagination()
    {
        $owner = $this->createPerson();
        $lands = array_map(fn() => $this->createLand($owner), range(1, 25));

        $this->browser()->actingAs($owner)
            ->get('/api/lands?page=2&itemsPerPage=10')
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 25)
            ->use(function (Json $json) {
                $json->assertThat('member', fn(Json $json) => $json->hasCount(10));
            });
    }

    public function testLookingForMember()
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
            ->get('/api/lands/looking_for_members')
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 2)
            ->assertJsonMatches('member[0].ulid', $land1->getUlid()->toString())
            ->assertJsonMatches('member[0].name', $land1->getName())
            ->assertJsonMatches('member[0].surface', $land1->getSurface())
            ->assertJsonMatches('member[1].ulid', $land2->getUlid()->toString())
            ->assertJsonMatches('member[1].name', $land2->getName())
            ->assertJsonMatches('member[1].surface', $land2->getSurface());
    }
}
