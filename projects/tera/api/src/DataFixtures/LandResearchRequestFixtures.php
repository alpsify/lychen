<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Factory\LandResearchRequestFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandResearchRequestFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        LandResearchRequestFactory::new()->create([
            'person' => $this->getReference(PersonFixtures::PERSON_6, Person::class)
        ]);

        LandResearchRequestFactory::new()->create([
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
