<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802173728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plant_soil_type (plant_id INT NOT NULL, soil_type_id INT NOT NULL, PRIMARY KEY (plant_id, soil_type_id))');
        $this->addSql('CREATE INDEX IDX_D561DC091D935652 ON plant_soil_type (plant_id)');
        $this->addSql('CREATE INDEX IDX_D561DC09A8AE1818 ON plant_soil_type (soil_type_id)');
        $this->addSql('ALTER TABLE plant_soil_type ADD CONSTRAINT FK_D561DC091D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_soil_type ADD CONSTRAINT FK_D561DC09A8AE1818 FOREIGN KEY (soil_type_id) REFERENCES soil_type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant_soil_type DROP CONSTRAINT FK_D561DC091D935652');
        $this->addSql('ALTER TABLE plant_soil_type DROP CONSTRAINT FK_D561DC09A8AE1818');
        $this->addSql('DROP TABLE plant_soil_type');
    }
}
