<?php

namespace App\Tests\Security;

use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandAreaParameterSecurityTest extends AbstractApiTestCase
{
    public function testPutDoesNotExist()
    {
        $context = $this->createLandContext();
        $this->addOneLandArea($context);

        $this->browser()
            ->put($this->getIriFromResource($context->landAreas[0]->getLandAreaParameter()))
            ->assertStatus(405);

        $this->browser()->actingAs($context->owner)
            ->put($this->getIriFromResource($context->landAreas[0]->getLandAreaParameter()))
            ->assertStatus(405);
    }

    public function testDeleteDoesNotExist()
    {
        $context = $this->createLandContext();
        $this->addOneLandArea($context);

        $this->browser()
            ->delete($this->getIriFromResource($context->landAreas[0]->getLandAreaParameter()))
            ->assertStatus(405);

        $this->browser()->actingAs($context->owner)
            ->delete($this->getIriFromResource($context->landAreas[0]->getLandAreaParameter()))
            ->assertStatus(405);
    }

    public function testPostDoesNotExist()
    {
        $owner = $this->createPerson();

        $this->browser()
            ->post('/api/land_area_parameters')
            ->assertStatus(404);

        $this->browser()->actingAs($owner)
            ->post('/api/land_area_parameters')
            ->assertStatus(404);
    }

    public function testCollectionDoesNotExist()
    {
        $owner = $this->createPerson();

        $this->browser()
            ->get('/api/land_area_parameters')
            ->assertStatus(404);

        $this->browser()->actingAs($owner)
            ->get('/api/land_area_parameters')
            ->assertStatus(404);
    }

    public function testUserCantAccessLandAreaSettingOfAnotherLand()
    {
        $context1 = $this->createLandContext();
        $this->addOneLandArea($context1);

        $context2 = $this->createLandContext();

        $this->browser()->actingAs($context2->owner)
            ->get($this->getIriFromResource($context1->landAreas[0]->getLandAreaParameter()))
            ->assertStatus(403);

        $this->browser()->actingAs($context2->owner)
            ->patch($this->getIriFromResource($context1->landAreas[0]->getLandAreaParameter()), ['json' => []])
            ->assertStatus(403);
    }
}
