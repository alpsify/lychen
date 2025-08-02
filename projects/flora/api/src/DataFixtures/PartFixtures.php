<?php

namespace App\DataFixtures;

use App\Story\DefaultPartsStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class PartFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        DefaultPartsStory::load();
    }

    public static function getGroups(): array
    {
        return ['initial_data'];
    }
}
