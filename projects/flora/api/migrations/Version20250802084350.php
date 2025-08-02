<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802084350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant ADD lunar_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plant ADD species_id INT NOT NULL');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D7211205867 FOREIGN KEY (lunar_type_id) REFERENCES lunar_type (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_AB030D7211205867 ON plant (lunar_type_id)');
        $this->addSql('CREATE INDEX IDX_AB030D72B2A1D860 ON plant (species_id)');
        $this->addSql('ALTER TABLE species ADD family_id INT NOT NULL');
        $this->addSql('ALTER TABLE species ADD CONSTRAINT FK_A50FF712C35E566A FOREIGN KEY (family_id) REFERENCES family (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_A50FF712C35E566A ON species (family_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant DROP CONSTRAINT FK_AB030D7211205867');
        $this->addSql('ALTER TABLE plant DROP CONSTRAINT FK_AB030D72B2A1D860');
        $this->addSql('DROP INDEX IDX_AB030D7211205867');
        $this->addSql('DROP INDEX IDX_AB030D72B2A1D860');
        $this->addSql('ALTER TABLE plant DROP lunar_type_id');
        $this->addSql('ALTER TABLE plant DROP species_id');
        $this->addSql('ALTER TABLE species DROP CONSTRAINT FK_A50FF712C35E566A');
        $this->addSql('DROP INDEX IDX_A50FF712C35E566A');
        $this->addSql('ALTER TABLE species DROP family_id');
    }
}
