<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021090812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD cat_id_id INT NOT NULL, ADD sup_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AC33F2EBA FOREIGN KEY (cat_id_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A63417709 FOREIGN KEY (sup_id_id) REFERENCES suppliers (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AC33F2EBA ON products (cat_id_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A63417709 ON products (sup_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AC33F2EBA');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A63417709');
        $this->addSql('DROP INDEX IDX_B3BA5A5AC33F2EBA ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A63417709 ON products');
        $this->addSql('ALTER TABLE products DROP cat_id_id, DROP sup_id_id');
    }
}
