<?php

namespace App\Tests\Security;

use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandProposalSecurityTest extends AbstractApiTestCase
{
    public function testPut()
    {
        $context = $this->createLandContext();
        $landProposal = $this->createLandProposal($context->land);

        $this->browser()
            ->put($this->getIriFromResource($landProposal))
            ->assertStatus(405);

        // Does not exist
        $this->browser()->actingAs($context->owner)
            ->put($this->getIriFromResource($landProposal))
            ->assertStatus(405);
    }

    public function testTodo()
    {
        $this->fail('TODO');
    }
}
