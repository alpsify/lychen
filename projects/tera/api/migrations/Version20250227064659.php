<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227064659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE land_greenhouse ADD land_id INT NOT NULL');
        $this->addSql('ALTER TABLE land_greenhouse ADD CONSTRAINT FK_CA2FB0A91994904A FOREIGN KEY (land_id) REFERENCES land (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CA2FB0A91994904A ON land_greenhouse (land_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE land_greenhouse DROP CONSTRAINT FK_CA2FB0A91994904A');
        $this->addSql('DROP INDEX IDX_CA2FB0A91994904A');
        $this->addSql('ALTER TABLE land_greenhouse DROP land_id');
    }
}
