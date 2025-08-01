<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250801162604 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE exposure (code VARCHAR(100) NOT NULL, id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, ulid UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_398F29CD77153098 ON exposure (code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_398F29CDC288C859 ON exposure (ulid)');
        $this->addSql('CREATE TABLE part (code VARCHAR(100) NOT NULL, id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, ulid UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_490F70C677153098 ON part (code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_490F70C6C288C859 ON part (ulid)');
        $this->addSql('CREATE TABLE plant (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, ulid UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AB030D72C288C859 ON plant (ulid)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE exposure');
        $this->addSql('DROP TABLE part');
        $this->addSql('DROP TABLE plant');
    }
}
