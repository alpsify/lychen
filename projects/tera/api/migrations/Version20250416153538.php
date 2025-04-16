<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250416153538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD land_accepted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD land_refused_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD is_land_accepted BOOLEAN NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD is_land_refused BOOLEAN NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD person_accepted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD person_refused_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD is_person_accepted BOOLEAN NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal ADD is_person_refused BOOLEAN NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP land_accepted_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP land_refused_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP is_land_accepted
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP is_land_refused
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP person_accepted_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP person_refused_at
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP is_person_accepted
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land_deal DROP is_person_refused
        SQL);
    }
}
