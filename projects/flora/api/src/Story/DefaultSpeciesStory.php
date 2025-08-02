<?php

namespace App\Story;

use App\Factory\SpeciesFactory;
use Zenstruck\Foundry\Story;

final class DefaultSpeciesStory extends Story
{
    public const string LETTUCE = 'lactuca_sativa';
    public const string CABBAGE = 'brassica_oleracea';
    public const string TOMATO = 'solanum_lycopersicum';
    public const string CARROT = 'daucus_carota';
    public const string BEAN = 'phaseolus_vulgaris';
    public const string CUCUMBER = 'cucumis_sativus';
    public const string CUCUMBER_KENIA = 'cucumis_metuliferus';

    public const array ALL = [
        self::LETTUCE,
        self::CABBAGE,
        self::TOMATO,
        self::CARROT,
        self::BEAN,
        self::CUCUMBER,
        self::CUCUMBER_KENIA
    ];

    public function build(): void
    {
        $this->createSpecies(self::CARROT, DefaultFamiliesStory::APIACEAE);
        $this->createSpecies(self::LETTUCE, DefaultFamiliesStory::ASTERACEAE);
        $this->createSpecies(self::TOMATO, DefaultFamiliesStory::SOLANACEAE);
        $this->createSpecies(self::CABBAGE, DefaultFamiliesStory::BRASSICACEAE);
        $this->createSpecies(self::BEAN, DefaultFamiliesStory::FABACEAE);
        $this->createSpecies(self::CUCUMBER, DefaultFamiliesStory::CUCURBITACEAE);
        $this->createSpecies(self::CUCUMBER_KENIA, DefaultFamiliesStory::CUCURBITACEAE);
    }

    protected function createSpecies(string $code, string $familyCode): void {
        $this->addState(
            $code,
            SpeciesFactory::new([
                'code' => $code,
                'family' => DefaultFamiliesStory::get($familyCode)
            ])->create()
        );
    }
}
