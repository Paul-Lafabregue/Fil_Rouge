<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019121231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD ord_cus_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE5EF455B6 FOREIGN KEY (ord_cus_id_id) REFERENCES customers (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE5EF455B6 ON orders (ord_cus_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE5EF455B6');
        $this->addSql('DROP INDEX IDX_E52FFDEE5EF455B6 ON orders');
        $this->addSql('ALTER TABLE orders DROP ord_cus_id_id');
    }
}
