<?php

namespace App\DataFixtures;

use App\Story\DefaultConsumptionMethodsStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class ConsumptionMethodFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['initial_data'];
    }

    public function load(ObjectManager $manager): void
    {
        DefaultConsumptionMethodsStory::load();
    }
}
