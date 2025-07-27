<?php

namespace App\Repository;

use App\Entity\LandHarvestEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LandHarvestEntry>
 */
class LandHarvestEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LandHarvestEntry::class);
    }
}
