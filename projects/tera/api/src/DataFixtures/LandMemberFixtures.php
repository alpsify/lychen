<?php

namespace App\DataFixtures;

use App\Entity\Land;
use App\Entity\Person;
use App\Factory\LandMemberFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandMemberFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        LandMemberFactory::new()->create([
            'land' => $this->getReference(LandFixtures::LAND_1, Land::class),
            'person' => $this->getReference(PersonFixtures::PERSON_1, Person::class),
            'owner' => true
        ]);

        LandMemberFactory::new()->create([
            'land' => $this->getReference(LandFixtures::LAND_1, Land::class),
            'person' => $this->getReference(PersonFixtures::PERSON_4, Person::class),
            'owner' => false,
        ]);

        LandMemberFactory::new()->create([
            'land' => $this->getReference(LandFixtures::LAND_1, Land::class),
            'person' => $this->getReference(PersonFixtures::PERSON_5, Person::class),
            'owner' => false,
        ]);

        LandMemberFactory::new()->create([
            'land' => $this->getReference(LandFixtures::LAND_2, Land::class),
            'person' => $this->getReference(PersonFixtures::PERSON_2, Person::class),
            'owner' => true
        ]);

        LandMemberFactory::new()->create([
            'land' => $this->getReference(LandFixtures::LAND_3, Land::class),
            'person' => $this->getReference(PersonFixtures::PERSON_3, Person::class),
            'owner' => true
        ]);
    }

    public function getDependencies(): array
    {
        return [
            LandFixtures::class,
            PersonFixtures::class
        ];
    }
}
