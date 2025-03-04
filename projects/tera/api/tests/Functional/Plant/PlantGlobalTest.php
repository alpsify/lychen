<?php

namespace App\Tests\Functional\Plant;

use App\Factory\PlantGlobalFactory;
use App\Tests\Utils\Abstract\AbstractApiTestCase;
use Zenstruck\Browser\Json;

class PlantGlobalTest extends AbstractApiTestCase
{
    public function testGet()
    {
        $person = $this->createPerson();
        $plantGlobal = PlantGlobalFactory::new()->create();

        $this->browser()->actingAs($person)
            ->get($this->getIriFromResource($plantGlobal))
            ->assertSuccessful()
            ->assertJsonMatches('ulid', $plantGlobal->getUlid()->toString())
            ->assertJsonMatches('name', $plantGlobal->getName())
            ->assertJsonMatches('latinName', $plantGlobal->getLatinName())
            ->assertJsonMatches('perpetual', $plantGlobal->isPerpetual())
            ->assertJsonMatches('daysToGerminationAverage', $plantGlobal->getDaysToGerminationAverage())
            ->assertJsonMatches('variety', $plantGlobal->getVariety())
            ->assertJsonMatches('sowingMinimalTemperature', $plantGlobal->getSowingMinimalTemperature())
            ->assertJsonMatches('sowingOptimalTemperature', $plantGlobal->getSowingOptimalTemperature())
            ->assertJsonMatches('sowingMonths', $plantGlobal->getSowingMonths())
            ->assertJsonMatches('harvestingMonths', $plantGlobal->getHarvestingMonths())
            ->assertJsonMatches('bio', $plantGlobal->isBio())
            ->assertJsonMatches('maturity', $plantGlobal->getMaturity())
            ->assertJsonMatches('soilType', $plantGlobal->getSoilType())
            ->assertJsonMatches('exposure', $plantGlobal->getExposure())
            ->assertJsonMatches('vegetationThreshold', $plantGlobal->getVegetationThreshold())
            ->assertJsonMatches('daysToHarvestMin', $plantGlobal->getDaysToHarvestMin())
            ->assertJsonMatches('daysToHarvestMax', $plantGlobal->getDaysToHarvestMax())
            ->assertJsonMatches('species', $plantGlobal->getSpecies())
            ->assertJsonMatches('family', $plantGlobal->getFamily())
            ->assertJsonMatches('plantingSpacingInCm', $plantGlobal->getPlantingSpacingInCm())
            ->use(function (Json $json) {
                $json->assertThat('createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('updatedAt', fn(Json $json) => $json->isNull());
            });
    }

    public function testCollection()
    {
        $person = $this->createPerson();
        $plantCount = 30;
        $plants = PlantGlobalFactory::new()->many($plantCount)->create();

        $this->browser()->actingAs($person)
            ->get('/api/plant_globals')
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', $plantCount)
            ->assertJsonMatches('member[0].ulid', $plants[0]->getUlid()->toString())
            ->assertJsonMatches('member[0].name', $plants[0]->getName())
            ->assertJsonMatches('member[0].latinName', $plants[0]->getLatinName())
            ->assertJsonMatches('member[0].perpetual', $plants[0]->isPerpetual())
            ->assertJsonMatches('member[0].daysToGerminationAverage', $plants[0]->getDaysToGerminationAverage())
            ->assertJsonMatches('member[0].variety', $plants[0]->getVariety())
            ->assertJsonMatches('member[0].sowingMinimalTemperature', $plants[0]->getSowingMinimalTemperature())
            ->assertJsonMatches('member[0].sowingOptimalTemperature', $plants[0]->getSowingOptimalTemperature())
            ->assertJsonMatches('member[0].sowingMonths', $plants[0]->getSowingMonths())
            ->assertJsonMatches('member[0].harvestingMonths', $plants[0]->getHarvestingMonths())
            ->assertJsonMatches('member[0].bio', $plants[0]->isBio())
            ->assertJsonMatches('member[0].maturity', $plants[0]->getMaturity())
            ->assertJsonMatches('member[0].soilType', $plants[0]->getSoilType())
            ->assertJsonMatches('member[0].exposure', $plants[0]->getExposure())
            ->assertJsonMatches('member[0].vegetationThreshold', $plants[0]->getVegetationThreshold())
            ->assertJsonMatches('member[0].daysToHarvestMin', $plants[0]->getDaysToHarvestMin())
            ->assertJsonMatches('member[0].daysToHarvestMax', $plants[0]->getDaysToHarvestMax())
            ->assertJsonMatches('member[0].species', $plants[0]->getSpecies())
            ->assertJsonMatches('member[0].family', $plants[0]->getFamily())
            ->assertJsonMatches('member[0].plantingSpacingInCm', $plants[0]->getPlantingSpacingInCm())
            ->use(function (Json $json) use ($plantCount) {
                $json->assertThat('member', fn(Json $json) => $json->hasCount($plantCount));
                $json->assertThat('member[0].createdAt', fn(Json $json) => $json->isNotNull());
                $json->assertThat('member[0].updatedAt', fn(Json $json) => $json->isNull());
            });
    }

    public function testCollectionPagination()
    {
        $person = $this->createPerson();
        $plantCount = 30;
        $plants = PlantGlobalFactory::new()->many($plantCount)->create();

        $this->browser()->actingAs($person)
            ->get('/api/plant_globals', ['query' => ['itemsPerPage' => 10, 'page' => 2]])
            ->assertSuccessful()
            ->assertJsonMatches('totalItems', $plantCount)
            ->use(function (Json $json) {
                $json->assertThat('member', fn(Json $json) => $json->hasCount(10));
            });
    }
}
