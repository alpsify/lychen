<?php

namespace App\DataFixtures;

use App\Factory\CultivationFactory;
use App\Factory\ExposureFactory;
use App\Factory\PlantFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        /*PlantFactory::new([
            'name' => 'Concombre du Kenya Kiwano',
            'perennial' => true,
            'cultivation' => CultivationFactory::new([
                'sowingMonths' => [3,4,5],
                'sowingMinimalTemperature' => 22,
                'sowingMaximalTemperature' => 25,
                'harvestingMonths' => [8, 9],
                'minimalDaysToHarvest' => 120,
                'maximalDaysToHarvest' => 150,
                'maturity' => '',
                'exposure' => '',
                'vegetationTemperatureThreshold' =>' ' ,
            ])->create(),
        ])->create();*/
    }

    public function getDependencies(): array
    {
        return [
            LunarTypeFixtures::class,
            SpeciesFixtures::class,
            PartFixtures::class,
        ];
    }
}
