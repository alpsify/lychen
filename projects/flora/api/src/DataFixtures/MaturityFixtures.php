<?php

namespace App\DataFixtures;

use App\Story\DefaultMaturitiesStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class MaturityFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        DefaultMaturitiesStory::load();
    }

    public static function getGroups(): array
    {
        return ['initial_data'];
    }
}
