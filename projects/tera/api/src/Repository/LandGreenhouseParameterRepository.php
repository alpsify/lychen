<?php

namespace App\Repository;

use App\Entity\LandGreenhouseParameter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LandGreenhouseParameter>
 */
class LandGreenhouseParameterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LandGreenhouseParameter::class);
    }
}
