<?php

namespace App\Service\Plant;

use App\Entity\LandCultivationPlan;
use App\Entity\PlantCustom;
use App\Entity\PlantGlobal;
use App\Entity\SeedStockEntry;
use Doctrine\ORM\EntityManagerInterface;

readonly class PlantConverter
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function convertToGlobal(PlantCustom $plantCustom): PlantGlobal
    {
        $newPlantGlobal = (new PlantGlobal())
            ->setName($plantCustom->getName())
            ->setLatinName($plantCustom->getLatinName())
            ->setPerpetual($plantCustom->isPerpetual())
            ->setDaysToGerminationAverage($plantCustom->getDaysToGerminationAverage())
            ->setVariety($plantCustom->getVariety())
            ->setSowingMinimalTemperature($plantCustom->getSowingMinimalTemperature())
            ->setSowingOptimalTemperature($plantCustom->getSowingOptimalTemperature())
            ->setSowingMonths($plantCustom->getSowingMonths())
            ->setHarvestingMonths($plantCustom->getHarvestingMonths())
            ->setBio($plantCustom->isBio())
            ->setMaturity($plantCustom->getMaturity())
            ->setSoilType($plantCustom->getSoilType())
            ->setExposure($plantCustom->getExposure())
            ->setVegetationThreshold($plantCustom->getVegetationThreshold())
            ->setDaysToHarvestMin($plantCustom->getDaysToHarvestMin())
            ->setDaysToHarvestMax($plantCustom->getDaysToHarvestMax())
            ->setSpecies($plantCustom->getSpecies())
            ->setFamily($plantCustom->getFamily())
            ->setPlantingSpacingInCm($plantCustom->getPlantingSpacingInCm());

        $this->migrateData($plantCustom, $newPlantGlobal);

        return $newPlantGlobal;
    }

    public function migrateData(PlantCustom $oldPlantCustom, PlantGlobal $newPlantGlobal): void
    {
        $this->migrateLandCultivationPlans($oldPlantCustom, $newPlantGlobal);
        $this->migrateSeedStockEntries($oldPlantCustom, $newPlantGlobal);
        $this->deleteOldPlantCustom($oldPlantCustom);
    }

    public function migrateLandCultivationPlans(PlantCustom $oldPlantCustom, PlantGlobal $newPlantGlobal): void
    {
        $cultivationPlans = $this->entityManager->getRepository(LandCultivationPlan::class)->findBy(['plant' => $oldPlantCustom]);
        foreach ($cultivationPlans as $cultivationPlan) {
            $cultivationPlan->setPlant($newPlantGlobal);
        }
        $this->entityManager->flush();
    }

    public function migrateSeedStockEntries(PlantCustom $oldPlantCustom, PlantGlobal $newPlantGlobal): void
    {
        $seedStockEntries = $this->entityManager->getRepository(SeedStockEntry::class)->findBy(['plant' => $oldPlantCustom]);
        foreach ($seedStockEntries as $seedStockEntry) {
            $seedStockEntry->setPlant($newPlantGlobal);
        }
        $this->entityManager->flush();
    }

    public function deleteOldPlantCustom(PlantCustom $oldPlantCustom): void
    {
        $this->entityManager->remove($oldPlantCustom);
        $this->entityManager->flush();
    }
}
