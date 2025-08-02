<?php

declare(strict_types=1);

namespace DoctrineDefaultMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250802084912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cultivation ADD maturity_id INT NOT NULL');
        $this->addSql('ALTER TABLE cultivation ADD exposure_id INT NOT NULL');
        $this->addSql('ALTER TABLE cultivation ADD CONSTRAINT FK_ACAFA7975074221B FOREIGN KEY (maturity_id) REFERENCES maturity (id) NOT DEFERRABLE');
        $this->addSql('ALTER TABLE cultivation ADD CONSTRAINT FK_ACAFA797C677C140 FOREIGN KEY (exposure_id) REFERENCES exposure (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_ACAFA7975074221B ON cultivation (maturity_id)');
        $this->addSql('CREATE INDEX IDX_ACAFA797C677C140 ON cultivation (exposure_id)');
        $this->addSql('ALTER TABLE plant ADD cultivation_id INT NOT NULL');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D723932FFBE FOREIGN KEY (cultivation_id) REFERENCES cultivation (id) NOT DEFERRABLE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AB030D723932FFBE ON plant (cultivation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cultivation DROP CONSTRAINT FK_ACAFA7975074221B');
        $this->addSql('ALTER TABLE cultivation DROP CONSTRAINT FK_ACAFA797C677C140');
        $this->addSql('DROP INDEX IDX_ACAFA7975074221B');
        $this->addSql('DROP INDEX IDX_ACAFA797C677C140');
        $this->addSql('ALTER TABLE cultivation DROP maturity_id');
        $this->addSql('ALTER TABLE cultivation DROP exposure_id');
        $this->addSql('ALTER TABLE plant DROP CONSTRAINT FK_AB030D723932FFBE');
        $this->addSql('DROP INDEX UNIQ_AB030D723932FFBE');
        $this->addSql('ALTER TABLE plant DROP cultivation_id');
    }
}
