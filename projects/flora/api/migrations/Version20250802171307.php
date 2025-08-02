<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802171307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plant_part_consumption_method (plant_part_id INT NOT NULL, consumption_method_id INT NOT NULL, PRIMARY KEY (plant_part_id, consumption_method_id))');
        $this->addSql('CREATE INDEX IDX_97320500366A8195 ON plant_part_consumption_method (plant_part_id)');
        $this->addSql('CREATE INDEX IDX_97320500E5A50FD3 ON plant_part_consumption_method (consumption_method_id)');
        $this->addSql('ALTER TABLE plant_part_consumption_method ADD CONSTRAINT FK_97320500366A8195 FOREIGN KEY (plant_part_id) REFERENCES plant_part (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_part_consumption_method ADD CONSTRAINT FK_97320500E5A50FD3 FOREIGN KEY (consumption_method_id) REFERENCES consumption_method (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant_part_consumption_method DROP CONSTRAINT FK_97320500366A8195');
        $this->addSql('ALTER TABLE plant_part_consumption_method DROP CONSTRAINT FK_97320500E5A50FD3');
        $this->addSql('DROP TABLE plant_part_consumption_method');
    }
}
