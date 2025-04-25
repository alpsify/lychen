<?php

namespace App\Repository;

use App\Entity\LandCultivationPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LandCultivationPlan>
 */
class LandCultivationPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LandCultivationPlan::class);
    }
}
