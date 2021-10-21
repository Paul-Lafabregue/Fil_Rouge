<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021091035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_details ADD pro_id_id INT NOT NULL, ADD ord_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1C19FAEF2 FOREIGN KEY (pro_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1B0E177A8 FOREIGN KEY (ord_id_id) REFERENCES orders (id)');
        $this->addSql('CREATE INDEX IDX_835379F1C19FAEF2 ON orders_details (pro_id_id)');
        $this->addSql('CREATE INDEX IDX_835379F1B0E177A8 ON orders_details (ord_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1C19FAEF2');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1B0E177A8');
        $this->addSql('DROP INDEX IDX_835379F1C19FAEF2 ON orders_details');
        $this->addSql('DROP INDEX IDX_835379F1B0E177A8 ON orders_details');
        $this->addSql('ALTER TABLE orders_details DROP pro_id_id, DROP ord_id_id');
    }
}
