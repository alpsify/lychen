<?php

namespace App\Tests\Security;

use App\Tests\Utils\Abstract\AbstractApiTestCase;

class LandApiKeySecurityTest extends AbstractApiTestCase
{
    public function testPost()
    {
        $this->browser()
            ->post('/api/land_api_keys', ['json' => []])
            ->assertStatus(401);

        $context = $this->createLandContext();
        $context2 = $this->createLandContext();

        $this->browser()->actingAs($context->owner)
            ->post('/api/land_api_keys', ['json' => [
                'name' => 'Test API Key',
                'permissions' => ['land_member:land_task:post', 'land_member:land_task:collection'],
                'land' => $this->getIriFromResource($context2->land),
            ]])
            ->assertStatus(403);
    }
}
