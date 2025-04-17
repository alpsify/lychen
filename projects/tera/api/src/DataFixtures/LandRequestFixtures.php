<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Factory\LandRequestFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandRequestFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        LandRequestFactory::new()->create([
            'person' => $this->getReference(PersonFixtures::PERSON_5, Person::class)
        ]);

        LandRequestFactory::new()->create([
            'person' => $this->getReference(PersonFixtures::PERSON_6, Person::class)
        ]);

        LandRequestFactory::new()->create([
            'person' => $this->getReference(PersonFixtures::PERSON_7, Person::class)
        ]);
    }


    public function getDependencies(): array
    {
        return [
            PersonFixtures::class,
        ];
    }
}
