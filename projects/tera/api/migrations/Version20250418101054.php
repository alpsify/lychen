<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418101054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal RENAME COLUMN preferred_garden_interaction_mode TO preferred_interaction_mode
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal ALTER preferred_interaction_mode TYPE VARCHAR(30)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request RENAME COLUMN preferred_garden_interaction_mode TO preferred_interaction_mode
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request ALTER preferred_interaction_mode TYPE VARCHAR(30)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal RENAME COLUMN preferred_interaction_mode TO preferred_garden_interaction_mode
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal ALTER preferred_garden_interaction_mode TYPE VARCHAR(30)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request RENAME COLUMN preferred_interaction_mode TO preferred_garden_interaction_mode
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request ALTER preferred_garden_interaction_mode TYPE VARCHAR(30)
        SQL);
    }
}
