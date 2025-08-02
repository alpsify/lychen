<?php

namespace App\Command;

use App\Entity\Species;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:initialize:species-data',
    description: 'Initialize species data',
)]
class InitializeSpeciesDataCommand extends Command
{
    public const string LETTUCE = 'lactuca_sativa';
    public const string CABBAGE = 'brassica_oleracea';
    public const string TOMATO = 'solanum_lycopersicum';
    public const string CARROT = 'daucus_carota';
    public const string BEAN = 'phaseolus_vulgaris';
    public const string CUCUMBER = 'cucumis_sativus';

    public const array ALL = [
        self::LETTUCE,
        self::CABBAGE,
        self::TOMATO,
        self::CARROT,
        self::BEAN,
        self::CUCUMBER
    ];

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        foreach (self::ALL as $speciesCode) {
            $io->info(sprintf('Add species with code : %s', $speciesCode));
            $species = new Species()->setCode($speciesCode);
            $this->entityManager->persist($species);
        }

        $this->entityManager->flush();

        $io->success('Species data initialized');

        return Command::SUCCESS;
    }
}
