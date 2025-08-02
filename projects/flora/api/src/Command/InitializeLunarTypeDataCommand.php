<?php

namespace App\Command;

use App\Entity\LunarType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:initialize:lunar-type-data',
    description: 'Initialize lunarType data',
)]
class InitializeLunarTypeDataCommand extends Command
{

    public const string ROOT = 'root';
    public const string LEAF = 'leaf';
    public const string FLOWER = 'flower';
    public const string SEED_AND_FRUIT = 'seed_and_fruit';

    public const array ALL = [
        self::ROOT,
        self::LEAF,
        self::FLOWER,
        self::SEED_AND_FRUIT
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

        foreach (self::ALL as $lunarTypeCode) {
            $io->info(sprintf('Add lunar type with code : %s', $lunarTypeCode));
            $lunarType = new LunarType()->setCode($lunarTypeCode);
            $this->entityManager->persist($lunarType);
        }

        $this->entityManager->flush();

        $io->success('Lunar type data initialized');

        return Command::SUCCESS;
    }
}
