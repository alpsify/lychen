<?php

namespace App\Tests\Utils\Trait;

use App\Entity\Land;
use App\Entity\LandProposal;
use App\Factory\LandProposalFactory;
use Zenstruck\Foundry\Persistence\Proxy;

trait LandProposalTrait
{
    protected function createLandProposal(Land|Proxy $land, array $attributes = null): LandProposal|Proxy
    {
        return LandProposalFactory::new()->create(array_merge([
            'land' => $land,
        ], $attributes ?? []));
    }
}
