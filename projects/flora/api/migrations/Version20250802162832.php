<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802162832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cultivation ADD maximal_days_to_germination INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cultivation RENAME COLUMN days_to_germination_average TO minimal_days_to_germination');
        $this->addSql('ALTER TABLE plant ADD melliferous BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE plant ADD medicinal BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cultivation ADD days_to_germination_average INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cultivation DROP minimal_days_to_germination');
        $this->addSql('ALTER TABLE cultivation DROP maximal_days_to_germination');
        $this->addSql('ALTER TABLE plant DROP melliferous');
        $this->addSql('ALTER TABLE plant DROP medicinal');
    }
}
