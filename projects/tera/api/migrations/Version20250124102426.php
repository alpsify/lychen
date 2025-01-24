<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124102426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person ADD email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD given_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD family_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP email');
        $this->addSql('ALTER TABLE person DROP given_name');
        $this->addSql('ALTER TABLE person DROP family_name');
    }
}
