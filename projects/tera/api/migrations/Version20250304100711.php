<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250304100711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plant_custom (person_id INT NOT NULL, id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1614C710217BBB47 ON plant_custom (person_id)');
        $this->addSql('CREATE TABLE plant_global (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE plant_custom ADD CONSTRAINT FK_1614C710217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_custom ADD CONSTRAINT FK_1614C710BF396750 FOREIGN KEY (id) REFERENCES plant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_global ADD CONSTRAINT FK_B955A08BF396750 FOREIGN KEY (id) REFERENCES plant (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE land_research_request ADD state VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE land_research_request ADD message JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE plant DROP CONSTRAINT fk_ab030d72217bbb47');
        $this->addSql('DROP INDEX idx_ab030d72217bbb47');
        $this->addSql('ALTER TABLE plant DROP person_id');
        $this->addSql('ALTER TABLE plant_conversion_request DROP CONSTRAINT FK_CBEB65F6E406F3A2');
        $this->addSql('ALTER TABLE plant_conversion_request DROP CONSTRAINT FK_CBEB65F6B925ED19');
        $this->addSql('ALTER TABLE plant_conversion_request ADD CONSTRAINT FK_CBEB65F6E406F3A2 FOREIGN KEY (plant_custom_id) REFERENCES plant_custom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_conversion_request ADD CONSTRAINT FK_CBEB65F6B925ED19 FOREIGN KEY (merge_candidate_id) REFERENCES plant_global (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plant_custom DROP CONSTRAINT FK_1614C710217BBB47');
        $this->addSql('ALTER TABLE plant_custom DROP CONSTRAINT FK_1614C710BF396750');
        $this->addSql('ALTER TABLE plant_global DROP CONSTRAINT FK_B955A08BF396750');
        $this->addSql('DROP TABLE plant_custom');
        $this->addSql('DROP TABLE plant_global');
        $this->addSql('ALTER TABLE plant ADD person_id INT NOT NULL');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT fk_ab030d72217bbb47 FOREIGN KEY (person_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_ab030d72217bbb47 ON plant (person_id)');
        $this->addSql('ALTER TABLE land_research_request DROP state');
        $this->addSql('ALTER TABLE land_research_request DROP message');
        $this->addSql('ALTER TABLE plant_conversion_request DROP CONSTRAINT fk_cbeb65f6e406f3a2');
        $this->addSql('ALTER TABLE plant_conversion_request DROP CONSTRAINT fk_cbeb65f6b925ed19');
        $this->addSql('ALTER TABLE plant_conversion_request ADD CONSTRAINT fk_cbeb65f6e406f3a2 FOREIGN KEY (plant_custom_id) REFERENCES plant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE plant_conversion_request ADD CONSTRAINT fk_cbeb65f6b925ed19 FOREIGN KEY (merge_candidate_id) REFERENCES plant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
