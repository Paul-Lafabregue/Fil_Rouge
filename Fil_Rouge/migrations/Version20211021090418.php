<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021090418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD cus_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEFE692FE5 FOREIGN KEY (cus_id_id) REFERENCES customers (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEFE692FE5 ON orders (cus_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEFE692FE5');
        $this->addSql('DROP INDEX IDX_E52FFDEEFE692FE5 ON orders');
        $this->addSql('ALTER TABLE orders DROP cus_id_id');
    }
}
