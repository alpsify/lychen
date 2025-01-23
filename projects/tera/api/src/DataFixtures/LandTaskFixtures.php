<?php

namespace App\DataFixtures;

use App\Factory\LandFactory;
use App\Factory\LandTaskFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandTaskFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        LandTaskFactory::new(function () {
            return ['land' => LandFactory::random()];
        })->range(40, 60)->create();
    }

    public function getDependencies(): array
    {
        return [
            LandMemberFixtures::class,
            LandAreaFixtures::class,
        ];
    }
}
