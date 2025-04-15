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
            ->post('/api/person_api_keys', ['json' => [
                'name' => 'Test API Key',
                'permissions' => ['person:land:post', 'person:land:collection'],
            ]])
            ->assertSuccessful()
            ->json()->decoded();

        $this->browser()->setDefaultHttpOptions(
            [
                'headers' => [
                    PersonApiKeyAuthenticator::HEADER_ATTRIBUTE => $response["token"]
                ]
            ]
        )->get('/api/lands')->assertSuccessful();
    }
}
