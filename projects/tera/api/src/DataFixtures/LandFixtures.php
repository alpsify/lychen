<?php

namespace App\DataFixtures;

use App\Factory\LandFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandFixtures extends Fixture implements DependentFixtureInterface
{
    public const string LAND_1 = 'land-one';
    public const string LAND_2 = 'land-two';
    public const string LAND_3 = 'land-three';

    public function load(ObjectManager $manager): void
    {
        $this->createLandAndAddReference(self::LAND_1, ['name' => 'Land One']);
        $this->createLandAndAddReference(self::LAND_2, ['name' => 'Land Two']);
        $this->createLandAndAddReference(self::LAND_3, ['name' => 'Land Three']);
    }

    private function createLandAndAddReference(string $reference, array|callable $attributes = []): void
    {
        $land = LandFactory::new()->create($attributes);
        $this->addReference($reference, $land->_real());
    }

    public function getDependencies(): array
    {
        return [
            PersonFixtures::class
        ];
    }
}
