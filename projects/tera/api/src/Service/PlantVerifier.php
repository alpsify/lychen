<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsAlias('plant.verifier', true, 'test')]
readonly class PlantVerifier
{
    public function __construct(private HttpClientInterface $floraClient)
    {

    }

    public function assertPlantExists(string $plantUlid): void
    {
        try {
            $this->floraClient->request(
                'GET',
                "/api/plants/{$plantUlid}",
            );
        } catch (Exception $e) {
            throw new NotFoundHttpException("Plant {$plantUlid} not found in Flora.");
        }
    }
}
