<?php

namespace App\Command;

use App\Entity\Part;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:initialize:part-data',
    description: 'Initialize part data',
)]
class InitializePartDataCommand extends Command
{

    public const string ROOT = 'root';
    public const string STEM = 'stem';
    public const string LEAF = 'leaf';
    public const string FLOWER = 'flower';
    public const string FRUIT = 'fruit';
    public const string SEED = 'seed';
    public const string BULB = 'bulb';
    public const string TUBER = 'tuber';
    public const string RHIZOME = 'rhizome';

    public const array ALL = [
        self::ROOT,
        self::STEM,
        self::LEAF,
        self::FLOWER,
        self::FRUIT,
        self::SEED,
        self::BULB,
        self::TUBER,
        self::RHIZOME
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

        foreach (self::ALL as $partCode) {
            $io->info(sprintf('Add part with code : %s', $partCode));
            $part = new Part()->setCode($partCode);
            $this->entityManager->persist($part);
        }

        $this->entityManager->flush();

        $io->success('Part data initialized');

        return Command::SUCCESS;
    }
}
