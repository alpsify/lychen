<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250412073815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal ADD published_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal ADD archived_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal ADD expiration_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request ADD published_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request ADD archived_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request ADD expiration_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request DROP published_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request DROP archived_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_request DROP expiration_date
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal DROP published_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal DROP archived_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_proposal DROP expiration_date
        SQL);
    }
}
