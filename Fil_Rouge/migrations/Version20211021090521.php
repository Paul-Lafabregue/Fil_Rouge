<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021090521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suppliers ADD cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE suppliers ADD CONSTRAINT FK_AC28B95C70C2373C FOREIGN KEY (cou_id_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_AC28B95C70C2373C ON suppliers (cou_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suppliers DROP FOREIGN KEY FK_AC28B95C70C2373C');
        $this->addSql('DROP INDEX IDX_AC28B95C70C2373C ON suppliers');
        $this->addSql('ALTER TABLE suppliers DROP cou_id_id');
    }
}
