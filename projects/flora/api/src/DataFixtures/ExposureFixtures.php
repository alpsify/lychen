<?php

namespace App\DataFixtures;

use App\Story\DefaultExposuresStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class ExposureFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        DefaultExposuresStory::load();
    }

    public static function getGroups(): array
    {
        return ['initial_data'];
    }
}
