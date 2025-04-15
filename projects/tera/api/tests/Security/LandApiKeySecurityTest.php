<?php

namespace App\Tests\Security;

use App\Security\Authenticator\LandApiKeyAuthenticator;
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

    public function testAuthentication()
    {
        $context = $this->createLandContext();

        $response = $this->browser()->actingAs($context->owner)
            ->post('/api/land_api_keys', ['json' => [
                'name' => 'Test API Key',
                'permissions' => ['land_member:land:get', 'land_member:land_task:post', 'land_member:land_task:collection'],
                'land' => $this->getIriFromResource($context->land),
            ]])
            ->assertSuccessful()
            ->json()->decoded();

        $this->browser()->setDefaultHttpOptions(
            [
                'headers' => [
                    LandApiKeyAuthenticator::HEADER_ATTRIBUTE => $response["token"]
                ]
            ]
        )->get($this->getIriFromResource($context->land))->assertSuccessful();
    }
}
