<?php

namespace App\Story;

use App\Factory\CultivationFactory;
use App\Factory\PlantFactory;
use Zenstruck\Foundry\Story;

final class DefaultPlantsStory extends Story
{
    public const string PLANT_1 = 'plant_1';
    public const string PLANT_2 = 'plant_2';
    public const string PLANT_3 = 'plant_3';
    public const string PLANT_4 = 'plant_4';
    public const string PLANT_5 = 'plant_5';
    public const string PLANT_6 = 'plant_6';

    public function build(): void
    {
        $this->createPlant(
            self::PLANT_1,
            [
                'name' => 'Concombre du Kenya Kiwano',
                'perennial' => false,
                'species' => DefaultSpeciesStory::get(DefaultSpeciesStory::CUCUMIS_METULIFERUS),
                'medicinal' => false,
                'melliferous' => false,
            ],
            [
                'sowingMonths' => [3, 4, 5],
                'sowingMinimalTemperature' => 22,
                'sowingMaximalTemperature' => 25,
                'minimalDaysToGermination' => 5,
                'maximalDaysToGermination' => 10,
                'harvestingMonths' => [8, 9],
                'minimalDaysToHarvest' => 120,
                'maximalDaysToHarvest' => 150,
                'maturity' => DefaultMaturitiesStory::get(DefaultMaturitiesStory::STANDARD),
                'exposure' => DefaultExposuresStory::get(DefaultExposuresStory::FULL_SUN),
                'vegetationTemperatureThreshold' => null,
            ]
        );

        $this->createPlant(
            self::PLANT_2,
            [
                'name' => 'Laitue Feuille de Chêne Blonde',
                'perennial' => false,
                'species' => DefaultSpeciesStory::get(DefaultSpeciesStory::LACTUCA_SATIVA),
                'medicinal' => false,
                'melliferous' => false,
            ],
            [
                'sowingMonths' => [2, 3, 4, 5, 6, 7, 8, 9],
                'sowingMinimalTemperature' => 10,
                'sowingMaximalTemperature' => 18,
                'minimalDaysToGermination' => 7,
                'maximalDaysToGermination' => 10,
                'harvestingMonths' => [4, 5, 6, 7, 8, 9, 10],
                'minimalDaysToHarvest' => 40,
                'maximalDaysToHarvest' => 50,
                'maturity' => DefaultMaturitiesStory::get(DefaultMaturitiesStory::STANDARD),
                'exposure' => DefaultExposuresStory::get(DefaultExposuresStory::PARTIAL_SHADE),
                'vegetationTemperatureThreshold' => null,
            ]
        );

        $this->createPlant(self::PLANT_3,
            [
                'name' => 'Artichaut Imperial Star',
                'perennial' => true,
                'species' => DefaultSpeciesStory::get(DefaultSpeciesStory::CYNARA_CARDUNCIUS),
                'medicinal' => false,
                'melliferous' => false,
            ],
            [
                'sowingMonths' => [2, 3, 4],
                'sowingMinimalTemperature' => 20,
                'sowingMaximalTemperature' => 25,
                'minimalDaysToGermination' => 15,
                'maximalDaysToGermination' => 20,
                'harvestingMonths' => [5, 6, 7, 8, 9, 10],
                'minimalDaysToHarvest' => 56,
                'maximalDaysToHarvest' => 70,
                'maturity' => DefaultMaturitiesStory::get(DefaultMaturitiesStory::STANDARD),
                'exposure' => DefaultExposuresStory::get(DefaultExposuresStory::FULL_SUN),
                'vegetationTemperatureThreshold' => null,
            ]
        );

        $this->createPlant(self::PLANT_4,
            [
                'name' => 'Carotte violette Gniff',
                'perennial' => false,
                'species' => DefaultSpeciesStory::get(DefaultSpeciesStory::DAUCUS_CAROTA),
                'medicinal' => false,
                'melliferous' => false,
            ],
            [
                'sowingMonths' => [2, 3, 4, 5],
                'sowingMinimalTemperature' => 10,
                'sowingMaximalTemperature' => 30,
                'minimalDaysToGermination' => 8,
                'maximalDaysToGermination' => 15,
                'harvestingMonths' => [6, 7, 8, 9, 10, 11],
                'minimalDaysToHarvest' => 75,
                'maximalDaysToHarvest' => 240,
                'maturity' => DefaultMaturitiesStory::get(DefaultMaturitiesStory::STANDARD),
                'exposure' => DefaultExposuresStory::get(DefaultExposuresStory::FULL_SUN),
                'vegetationTemperatureThreshold' => null,
            ]
        );

        $this->createPlant(self::PLANT_5,
            [
                'name' => 'Haricot à rames mangetout à cosses violettes',
                'perennial' => false,
                'species' => DefaultSpeciesStory::get(DefaultSpeciesStory::PHASEOLUS_VULGARIS),
                'medicinal' => false,
                'melliferous' => false,
            ],
            [
                'sowingMonths' => [5, 6],
                'sowingMinimalTemperature' => 16,
                'sowingMaximalTemperature' => 25,
                'minimalDaysToGermination' => 8,
                'maximalDaysToGermination' => 12,
                'harvestingMonths' => [8, 9],
                'minimalDaysToHarvest' => 90,
                'maximalDaysToHarvest' => 120,
                'maturity' => DefaultMaturitiesStory::get(DefaultMaturitiesStory::STANDARD),
                'exposure' => DefaultExposuresStory::get(DefaultExposuresStory::FULL_SUN),
                'vegetationTemperatureThreshold' => null,
            ]
        );

        $this->createPlant(self::PLANT_6,
            [
                'name' => 'Basilic Grand vert',
                'perennial' => false,
                'species' => DefaultSpeciesStory::get(DefaultSpeciesStory::OCIMUM_BASILICUM),
                'medicinal' => true,
                'melliferous' => true,
            ],
            [
                'sowingMonths' => [3, 4, 5],
                'sowingMinimalTemperature' => 20,
                'sowingMaximalTemperature' => 20,
                'minimalDaysToGermination' => 10,
                'maximalDaysToGermination' => 10,
                'harvestingMonths' => [6, 7, 8, 9, 10],
                'minimalDaysToHarvest' => 60,
                'maximalDaysToHarvest' => 60,
                'maturity' => DefaultMaturitiesStory::get(DefaultMaturitiesStory::STANDARD),
                'exposure' => DefaultExposuresStory::get(DefaultExposuresStory::PARTIAL_SHADE),
                'vegetationTemperatureThreshold' => null,
            ]
        );
    }

    protected function createPlant(string $stateId, array $attributes, ?array $cultivationAttributes = []): void
    {
        $this->addState(
            $stateId,
            PlantFactory::new([
                ...$attributes,
                'cultivation' => CultivationFactory::new($cultivationAttributes)
            ])->create()
        );
    }
}
