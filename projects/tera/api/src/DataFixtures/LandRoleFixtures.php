<?php

namespace App\DataFixtures;

use App\Entity\Land;
use App\Factory\LandRoleFactory;
use App\Security\Constant\Permissions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LandRoleFixtures extends Fixture implements DependentFixtureInterface
{
    public const string LAND_1_ROLE_ADMIN = 'land-one-role-administrateur';
    public const string LAND_1_ROLE_COLLABORATOR = 'land-one-role-collaborator';
    public const string LAND_2_ROLE_ADMIN = 'land-two-role-admin';
    public const string LAND_2_ROLE_MANAGER = 'land-two-role-manager';

    public function load(ObjectManager $manager): void
    {
        $this->createLandRoleAndAddReference(self::LAND_1_ROLE_ADMIN, [
            'land' => $this->getReference(LandFixtures::LAND_1, Land::class),
            'name' => 'Administrateur',
            'permissions' => Permissions::ALL,
        ]);

        $this->createLandRoleAndAddReference(self::LAND_1_ROLE_COLLABORATOR, [
            'land' => $this->getReference(LandFixtures::LAND_1, Land::class),
            'name' => 'Collaborateur',
            'permissions' => Permissions::ALL,
        ]);

        $this->createLandRoleAndAddReference(self::LAND_2_ROLE_ADMIN, [
            'land' => $this->getReference(LandFixtures::LAND_2, Land::class),
            'name' => 'Admin',
            'permissions' => Permissions::ALL,
        ]);

        $this->createLandRoleAndAddReference(self::LAND_2_ROLE_MANAGER, [
            'land' => $this->getReference(LandFixtures::LAND_2, Land::class),
            'name' => 'Manager',
            'permissions' => Permissions::ALL,
        ]);
    }

    private function createLandRoleAndAddReference(string $reference, array|callable $attributes = []): void
    {
        $landRole = LandRoleFactory::new()->create($attributes);
        $this->addReference($reference, $landRole->_real());
    }

    public function getDependencies(): array
    {
        return [
            PersonFixtures::class
        ];
    }
}
