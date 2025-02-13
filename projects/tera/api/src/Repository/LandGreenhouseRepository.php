<?php

namespace App\Repository;

use App\Entity\LandGreenhouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LandGreenhouse>
 */
class LandGreenhouseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LandGreenhouse::class);
    }
}
