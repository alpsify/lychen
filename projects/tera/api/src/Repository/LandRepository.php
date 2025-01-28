<?php

namespace App\Repository;

use App\Entity\Land;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Land>
 */
class LandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Land::class);
    }

    public function findLookingForMember(): Query
    {
        return $this->createQueryBuilder('l')
            ->innerJoin('l.landSetting', 'ls', Join::WITH, 'ls.lookingForMember = true')
            ->getQuery();
    }
}
