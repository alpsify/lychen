<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250411073521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land DROP CONSTRAINT FK_A800D5D8248673E9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land ADD CONSTRAINT FK_A800D5D8248673E9 FOREIGN KEY (default_role_id) REFERENCES land_role (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE land DROP CONSTRAINT fk_a800d5d8248673e9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE land ADD CONSTRAINT fk_a800d5d8248673e9 FOREIGN KEY (default_role_id) REFERENCES land_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }
}
