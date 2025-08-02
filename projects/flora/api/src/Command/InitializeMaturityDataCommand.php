<?php

namespace App\Command;

use App\Entity\Maturity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:initialize:maturity-data',
    description: 'Initialize maturity data',
)]
class InitializeMaturityDataCommand extends Command
{
    public const string VERY_EARLY = 'very_early';
    public const string EARLY = 'early';
    public const string MID_EARLY = 'mid_early';
    public const string STANDARD = 'standard';
    public const string MID_LATE = 'mid_late';
    public const string LATE = 'late';
    public const string VERY_LATE = 'very_late';

    public const array ALL = [
        self::VERY_EARLY,
        self::EARLY,
        self::MID_EARLY,
        self::STANDARD,
        self::MID_LATE,
        self::LATE,
        self::VERY_LATE
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

        foreach (self::ALL as $maturityCode) {
            $io->info(sprintf('Add maturity with code : %s', $maturityCode));
            $maturity = new Maturity()->setCode($maturityCode);
            $this->entityManager->persist($maturity);
        }

        $this->entityManager->flush();

        $io->success('Maturity data initialized');

        return Command::SUCCESS;
    }
}
