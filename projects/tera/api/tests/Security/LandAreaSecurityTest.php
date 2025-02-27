<?php

namespace App\Tests\Security;

use App\Entity\Land;
use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandAreaSecurityTest extends AbstractApiTestCase
{
    public function testPutDoesNotExist()
    {
        $context = $this->createLandContext();
        $this->addOneLandArea($context);

        $this->browser()->actingAs($context->owner)
            ->put($this->getIriFromResource($context->landAreas[0]))
            ->assertStatus(405);
    }

    public function testPost()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();

        // User can't create a LandArea for a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->post('/api/land_areas', ['json' => ['land' => $this->getIriFromResource($context1->land)]])
            ->assertStatus(403);

        // User cannot create a LandArea for a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->post('/api/land_areas', ['json' => ['land' => $this->getIriFromResource($context1->land->_real())]])
            ->assertStatus(403);
    }

    public function testPatch()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();
        $this->addOneLandArea($context1);

        // User can't patch a LandArea for a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->patch($this->getIriFromResource($context1->landAreas[0]), ['json' => []])
            ->assertStatus(403);

        // User can't patch a LandArea with a Land they are not a member of
        $this->browser()->actingAs($context1->owner)
            ->patch($this->getIriFromResource($context1->landAreas[0]), ['json' => ['land' => $this->getIriFromResource($context2->land)]]);

        $this->browser()->actingAs($context1->owner)
            ->get($this->getIriFromResource($context1->landAreas[0]))
            ->assertSuccessful()
            ->assertJsonMatches('land', $this->findIriBy(Land::class, ['id' => $context1->land->getId()]));

        $this->browser()->actingAs($context2->owner)
            ->get($this->getIriFromResource($context1->landAreas[0]))
            ->assertStatus(403);

        // User cannot patch a LandArea for a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->patch($this->getIriFromResource($context1->landAreas[0]), ['json' => []])
            ->assertStatus(403);

    }

    public function testGet()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();
        $this->addOneLandArea($context1);

        // User can't get a LandArea for a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->get($this->getIriFromResource($context1->landAreas[0]))
            ->assertStatus(403);

        // User cannot get a LandArea for a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->get($this->getIriFromResource($context1->landAreas[0]))
            ->assertStatus(403);
    }

    public function testDelete()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();
        $this->addOneLandArea($context1);

        // User can't delete a LandArea for a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->delete($this->getIriFromResource($context1->landAreas[0]))
            ->assertStatus(403);

        // User cannot delete a LandArea for a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->delete($this->getIriFromResource($context1->landAreas[0]))
            ->assertStatus(403);
    }

    public function testCollection()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();
        $this->addOneLandArea($context1);

        // User can't list LandArea without a Land query parameter
        $this->browser()->actingAs($context1->owner)
            ->get('/api/land_areas', ['query' => ['land' => '']])
            ->assertStatus(422);

        // User can't list LandArea for a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->get('/api/land_areas', ['query' => ['land' => $this->getIriFromResource($context1->land)]])
            ->assertStatus(403);

        // User cannot list LandArea for a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->get('/api/land_areas', ['query' => ['land' => $this->getIriFromResource($context1->land->_real())]])
            ->assertStatus(403);
    }
}
