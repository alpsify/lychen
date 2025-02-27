<?php

namespace App\Tests\Security;

use App\Tests\Utils\Abstract\AbstractApiTestCase;
use function Zenstruck\Foundry\faker;

class LandSecurityTest extends AbstractApiTestCase
{
    public function testPutDoesNotExist()
    {
        $context = $this->createLandContext();

        $this->browser()->actingAs($context->owner)
            ->put($this->getIriFromResource($context->land))
            ->assertStatus(405);
    }

    public function testUserCantAccessOtherLands()
    {
        $context1 = $this->createLandContext();
        $context2 = $this->createLandContext();

        $this->browser()->actingAs($context2->owner)
            ->get($this->getIriFromResource($context1->land))
            ->assertStatus(403);

        $this->browser()->actingAs($context2->owner)
            ->patch($this->getIriFromResource($context1->land), ['json' => ['name' => faker()->name()]])
            ->assertStatus(403);

        $this->browser()->actingAs($context2->owner)
            ->delete($this->getIriFromResource($context1->land))
            ->assertStatus(403);
    }
}
