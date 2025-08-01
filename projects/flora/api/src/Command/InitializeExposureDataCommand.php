<?php

namespace App\Command;

use App\Entity\Exposure;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:initialize:exposure-data',
    description: 'Initialize exposure data',
)]
class InitializeExposureDataCommand extends Command
{
    public const string FULL_SUN = 'full_sun';
    public const string PARTIAL_SHADE = 'partial_shade';
    public const string SHADE = 'shade';
    public const string BRIGHT_INDIRECT = 'bright_indirect';
    public const string ADAPTABLE = 'adaptable';

    public const array ALL = [
        self::FULL_SUN,
        self::PARTIAL_SHADE,
        self::SHADE,
        self::BRIGHT_INDIRECT,
        self::ADAPTABLE
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

        foreach (self::ALL as $exposureCode) {
            $io->info(sprintf('Add exposure with code : %s', $exposureCode));
            $exposure = new Exposure()->setCode($exposureCode);
            $this->entityManager->persist($exposure);
        }

        $this->entityManager->flush();

        $io->success('Exposure data initialized');

        return Command::SUCCESS;
    }
}
