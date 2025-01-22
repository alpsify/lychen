<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findOneByAuthId(string $authId): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.authId = :authId')
            ->setParameter('authId', $authId)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
