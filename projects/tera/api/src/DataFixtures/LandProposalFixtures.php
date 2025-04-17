<?php

namespace App\DataFixtures;

use App\Entity\Land;
use App\Factory\LandProposalFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandProposalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        LandProposalFactory::new()->create([
            'land' => $this->getReference(LandFixtures::LAND_4, Land::class)
        ]);
    }


    public function getDependencies(): array
    {
        return [
            LandFixtures::class,
        ];
    }
}
