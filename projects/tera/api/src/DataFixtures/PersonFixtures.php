<?php

namespace App\DataFixtures;

use App\Factory\PersonFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonFixtures extends Fixture
{
    public const string PERSON_1 = 'person_1';
    public const string PERSON_2 = 'person_2';
    public const string PERSON_3 = 'person_3';
    public const string PERSON_4 = 'person_4';
    public const string PERSON_5 = 'person_5';
    public const string PERSON_6 = 'person_6';
    public const string PERSON_7 = 'person_7';

    public function load(ObjectManager $manager): void
    {
        $this->createPersonAndAddReference(self::PERSON_1);
        $this->createPersonAndAddReference(self::PERSON_2);
        $this->createPersonAndAddReference(self::PERSON_3);
        $this->createPersonAndAddReference(self::PERSON_4);
        $this->createPersonAndAddReference(self::PERSON_5);
        $this->createPersonAndAddReference(self::PERSON_6);
        $this->createPersonAndAddReference(self::PERSON_7);
    }

    private function createPersonAndAddReference(string $reference, array|callable $attributes = []): void {
        $person = PersonFactory::new()->create($attributes);
        $this->addReference($reference, $person->_real());
    }
}
