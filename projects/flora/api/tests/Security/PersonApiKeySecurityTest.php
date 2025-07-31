<?php

namespace App\Tests\Security;

use App\Security\Authenticator\PersonApiKeyAuthenticator;
use App\Tests\Utils\Abstract\AbstractApiTestCase;

class PersonApiKeySecurityTest extends AbstractApiTestCase
{

    public function testAuthentication(): void
    {
        $person = $this->createPerson();

        $response = $this->browser()->actingAs($person)
            ->post('/api/person_api_keys',
                ['json' => [
                    'name' => 'Test API Key',
                    'permissions' => [],
                ]])
            ->assertSuccessful()
            ->json()->decoded();

        $this->browser()->setDefaultHttpOptions(
            [
                'headers' => [
                    PersonApiKeyAuthenticator::HEADER_ATTRIBUTE => $response["token"]
                ]
            ]
        )->get('/api/plants')->assertSuccessful();
    }

    public function testAuthenticationWithInvalidToken(): void
    {
        $this->browser()->setDefaultHttpOptions(
            [
                'headers' => [
                    PersonApiKeyAuthenticator::HEADER_ATTRIBUTE => 'invalid-token'
                ]
            ]
        )->get('/api/plants')->assertStatus(401);
    }

    public function testCannotCreateApiKeyThroughApi(): void
    {
        $person = $this->createPerson();
        $apiKey = $this->createPersonApiKey($person,
            ['permissions' => ['person:person_api_key:post']]);

        $this->browser()->actingAs($apiKey)
            ->post('/api/person_api_keys',
                ['json' => [
                    'name' => 'Test API Key',
                    'permissions' => [],
                ]])->assertStatus(403);
    }
}
