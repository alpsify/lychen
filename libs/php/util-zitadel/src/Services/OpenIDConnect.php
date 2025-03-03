<?php

namespace Lychen\UtilZitadelBundle\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly class OpenIDConnect
{
    public function __construct(private HttpClientInterface $client, private string $domain, private string $clientId, private string $clientSecret)
    {
    }

    public function introspectToken(string $token): array
    {
        $response = $this->client->request(
            'POST',
            $this->domain . '/oauth/v2/introspect',
            [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
                ],
                'body' => [
                    'token' => $token
                ]
            ]
        );
        return $response->toArray();
    }
}
