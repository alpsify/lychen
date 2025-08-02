<?php

namespace App\Command;

use App\Entity\Family;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:initialize:family-data',
    description: 'Initialize family data',
)]
class InitializeFamilyDataCommand extends Command
{
    public const string ASTERACEAE = 'asteraceae';
    public const string BRASSICACEAE = 'brassicaceae';
    public const string FABACEAE = 'fabaceae';
    public const string SOLANACEAE = 'solanaceae';
    public const string CUCURBITACEAE = 'cucurbitaceae';
    public const string LILIACEAE = 'liliaceae';

    public const array ALL = [
        self::ASTERACEAE,
        self::BRASSICACEAE,
        self::FABACEAE,
        self::SOLANACEAE,
        self::CUCURBITACEAE,
        self::LILIACEAE
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

        foreach (self::ALL as $familyCode) {
            $io->info(sprintf('Add family with code : %s', $familyCode));
            $family = new Family()->setCode($familyCode);
            $this->entityManager->persist($family);
        }

        $this->entityManager->flush();

        $io->success('Family data initialized');

        return Command::SUCCESS;
    }
}
