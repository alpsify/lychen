<?php

namespace App\Tests\Functional\Land;

use App\Security\Constant\LandPermission;
use App\Tests\Utils\Abstract\AbstractApiTestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Zenstruck\Browser\Json;
use function Zenstruck\Foundry\faker;

class LandTest extends AbstractApiTestCase
{
    #[DataProvider('landDataProvider')]
    public function testPost(int $surface, string $kind)
    {
        $person = $this->createPerson();

        $name = faker()->name();

        $this->browser()->actingAs($person)
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
        $context = $this->createLandContext();

        $this->browser()->actingAs($context->owner)
            ->get($this->getIriFromResource($context->land))
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $context->land->getUlid()->toString())
            ->assertJsonMatches('name', $context->land->getName())
            ->assertJsonMatches('surface', $context->land->getSurface())
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNull());
            });

        // Member with permissions
        $landRole = $this->createLandRole($context->land, [LandPermission::READ]);
        $this->addLandMember($context, [$landRole]);

        $this->browser()->actingAs($context->landMembers[0]->getPerson())
            ->get($this->getIriFromResource($context->land->_real()))
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $context->land->getUlid()->toString())
            ->assertJsonMatches('name', $context->land->getName())
            ->assertJsonMatches('surface', $context->land->getSurface())
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNull());
                $json->assertThat('landSetting', fn(Json $json) => $json->isNotNull());
            });
    }

    public function testPatch()
    {
        $context = $this->createLandContext();

        $newName = faker()->name();
        $newSurface = faker()->numberBetween(10, 200);

        $this->browser()->actingAs($context->owner)
            ->patch($this->getIriFromResource($context->land), [
                'json' => [
                    'name' => $newName,
                    'surface' => $newSurface,
                ]
            ])
            ->assertStatus(200)
            ->assertJsonMatches('ulid', $context->land->getUlid()->toString())
            ->assertJsonMatches('name', $newName)
            ->assertJsonMatches('surface', $newSurface)
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNotNull());
            });

        // Member with permissions
        $landRole = $this->createLandRole($context->land, [LandPermission::UPDATE]);
        $this->addLandMember($context, [$landRole]);

        $newName = faker()->name();
        $newSurface = faker()->numberBetween(10, 200);

        $this->browser()->actingAs($context->landMembers[0]->getPerson())
            ->patch($this->getIriFromResource($context->land->_real()), [
                'json' => [
                    'name' => $newName,
                    'surface' => $newSurface,
                ]
            ])
            ->assertStatus(200)
            ->assertJsonMatches('ulid', $context->land->getUlid()->toString())
            ->assertJsonMatches('name', $newName)
            ->assertJsonMatches('surface', $newSurface)
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNotNull());
            });
    }

    public function testPatchWithInvalidSurface()
    {
        $context = $this->createLandContext();

        $this->browser()->actingAs($context->owner)
            ->patch($this->getIriFromResource($context->land), [
                'json' => [
                    'surface' => -1 // Invalid surface
                ]
            ])
            ->assertStatus(422);
    }

    public function testDelete()
    {
        $context = $this->createLandContext();

        $this->browser()->actingAs($context->owner)
            ->delete($this->getIriFromResource($context->land))
            ->assertStatus(204);

        // Member with permissions
        $context = $this->createLandContext();
        $landRole = $this->createLandRole($context->land, [LandPermission::DELETE]);
        $this->addLandMember($context, [$landRole]);

        $this->browser()->actingAs($context->landMembers[0]->getPerson())
            ->delete($this->getIriFromResource($context->land->_real()))
            ->assertStatus(204);
    }

    public function testCollection()
    {
        $context1 = $this->createLandContext();
        $this->createLand($context1->owner);

        $this->createLandContext(); // It is mandatory to ensure that lands are filtered based on the user

        $this->browser()->actingAs($context1->owner)
            ->get('/api/lands')
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 2)
            ->assertJsonMatches('member[0].ulid', $context1->land->getUlid()->toString())
            ->assertJsonMatches('member[0].name', $context1->land->getName())
            ->assertJsonMatches('member[0].surface', $context1->land->getSurface());
    }

    public function testCollectionPagination()
    {
        $owner = $this->createPerson();
        array_map(fn() => $this->createLand($owner), range(1, 25));

        $this->browser()->actingAs($owner)
            ->get('/api/lands', ['query' => ['itemsPerPage' => 10, 'page' => 2]])
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 25)
            ->use(function (Json $json) {
                $json->assertThat('member', fn(Json $json) => $json->hasCount(10));
            });
    }

    public function testLookingForMembers()
    {
        $context1 = $this->createLandContext();
        $context1->land->getLandSetting()->setLookingForMember(true);
        array_map(fn() => $this->createLand($context1->owner), range(1, 3));

        $context2 = $this->createLandContext();
        $context2->land->getLandSetting()->setLookingForMember(true);
        $context2->land->_save();

        $this->browser()->actingAs($context1->owner)
            ->get('/api/lands/looking_for_members')
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 2)
            ->use(function (Json $json) {
                $json->assertThat('view', fn(Json $json) => $json->isNull());
            })
            ->assertJsonMatches('member[0].ulid', $context1->land->getUlid()->toString())
            ->assertJsonMatches('member[0].name', $context1->land->getName())
            ->assertJsonMatches('member[0].surface', $context1->land->getSurface())
            ->assertJsonMatches('member[1].ulid', $context2->land->getUlid()->toString())
            ->assertJsonMatches('member[1].name', $context2->land->getName())
            ->assertJsonMatches('member[1].surface', $context2->land->getSurface());
    }

    public function testLookingForMembersPagination()
    {
        $context = $this->createLandContext();
        $lands = [];
        for ($i = 0; $i < 25; $i++) {
            $land = $this->createLand($context->owner);
            $land->getLandSetting()->setLookingForMember(true);
            $lands[] = $land;
        }

        $context2 = $this->createLandContext();
        $context2->land->getLandSetting()->setLookingForMember(true);
        $context2->land->_save();

        $this->browser()->actingAs($context->owner)
            ->get('/api/lands/looking_for_members', ['query' => ['itemsPerPage' => 10, 'page' => 2]])
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', 26)
            ->use(function (Json $json) {
                $json->assertThat('view', fn(Json $json) => $json->isNotNull());
            })
            ->use(function (Json $json) {
                $json->assertThat('member', fn(Json $json) => $json->hasCount(10));
            });
    }
}
