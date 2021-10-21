<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021090235 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customers ADD prf_id_id INT DEFAULT NULL, ADD par_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E215407EB21 FOREIGN KEY (prf_id_id) REFERENCES professionals (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E2135A26534 FOREIGN KEY (par_id_id) REFERENCES particuliars (id)');
        $this->addSql('CREATE INDEX IDX_62534E215407EB21 ON customers (prf_id_id)');
        $this->addSql('CREATE INDEX IDX_62534E2135A26534 ON customers (par_id_id)');
        $this->addSql('ALTER TABLE particuliars ADD cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE particuliars ADD CONSTRAINT FK_38DF00A570C2373C FOREIGN KEY (cou_id_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_38DF00A570C2373C ON particuliars (cou_id_id)');
        $this->addSql('ALTER TABLE professionals ADD cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE professionals ADD CONSTRAINT FK_2DBE308E70C2373C FOREIGN KEY (cou_id_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_2DBE308E70C2373C ON professionals (cou_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E215407EB21');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E2135A26534');
        $this->addSql('DROP INDEX IDX_62534E215407EB21 ON customers');
        $this->addSql('DROP INDEX IDX_62534E2135A26534 ON customers');
        $this->addSql('ALTER TABLE customers DROP prf_id_id, DROP par_id_id');
        $this->addSql('ALTER TABLE particuliars DROP FOREIGN KEY FK_38DF00A570C2373C');
        $this->addSql('DROP INDEX IDX_38DF00A570C2373C ON particuliars');
        $this->addSql('ALTER TABLE particuliars DROP cou_id_id');
        $this->addSql('ALTER TABLE professionals DROP FOREIGN KEY FK_2DBE308E70C2373C');
        $this->addSql('DROP INDEX IDX_2DBE308E70C2373C ON professionals');
        $this->addSql('ALTER TABLE professionals DROP cou_id_id');
    }
}
