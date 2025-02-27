<?php

namespace App\Tests\Security;

use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandSecurityTest extends AbstractApiTestCase
{
    public function testPut()
    {
        $context = $this->createLandContext();

        $this->browser()
            ->put($this->getIriFromResource($context->land))
            ->assertStatus(405);

        // Does not exist
        $this->browser()->actingAs($context->owner)
            ->put($this->getIriFromResource($context->land))
            ->assertStatus(405);
    }

    public function testPost()
    {
        // User cannot create a Land if they are not authenticated
        $this->browser()
            ->post('/api/lands')
            ->assertStatus(401);
    }

    public function testPatch()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();
        $this->addOneLandArea($context1);

        // User cannot patch a Land if they are not authenticated
        $this->browser()
            ->patch($this->getIriFromResource($context1->land), ['json' => []])
            ->assertStatus(401);

        // User cannot patch a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->patch($this->getIriFromResource($context1->land), ['json' => []])
            ->assertStatus(403);

        // User cannot patch a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->patch($this->getIriFromResource($context1->land->_real()), ['json' => []])
            ->assertStatus(403);

    }

    public function testGet()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();

        // User cannot get a Land if they are not authenticated
        $this->browser()
            ->get($this->getIriFromResource($context1->land))
            ->assertStatus(401);

        // User cannot get a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->get($this->getIriFromResource($context1->land))
            ->assertStatus(403);

        // User cannot get a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->get($this->getIriFromResource($context1->land->_real()))
            ->assertStatus(403);
    }

    public function testDelete()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();

        // User cannot delete a Land if they are not authenticated
        $this->browser()
            ->delete($this->getIriFromResource($context1->land))
            ->assertStatus(401);

        // User cannot delete a Land they are not a member of
        $this->browser()->actingAs($context2->owner)
            ->delete($this->getIriFromResource($context1->land))
            ->assertStatus(403);

        // User cannot delete a Land for which they do not have permission
        $landRole = $this->createLandRole($context1->land);
        $this->addMember($context1, [$landRole]);
        $this->browser()->actingAs($context1->landMembers[0]->getPerson())
            ->delete($this->getIriFromResource($context1->land->_real()))
            ->assertStatus(403);
    }

    public function testCollection()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();

        // User cannot list Land if they are not authenticated
        $this->browser()
            ->get('/api/lands')
            ->assertStatus(401);
    }

    public function testLookingForMembers()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();

        // User cannot list Land if they are not authenticated
        $this->browser()
            ->get('/api/lands/looking_for_members')
            ->assertStatus(401);
    }
}
