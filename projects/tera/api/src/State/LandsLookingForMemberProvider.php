<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Repository\LandRepository;

final readonly class LandsLookingForMemberProvider implements ProviderInterface
{
    public function __construct(
        private LandRepository $landRepository,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        return $this->landRepository->findLookingForMember()->getResult();
    }
}
