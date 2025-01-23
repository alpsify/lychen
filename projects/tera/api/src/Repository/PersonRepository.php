<?php

namespace App\Repository;

use App\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Person>
 */
class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    public function findOneByAuthId(string $authId): ?Person
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.authId = :authId')
            ->setParameter('authId', $authId)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
