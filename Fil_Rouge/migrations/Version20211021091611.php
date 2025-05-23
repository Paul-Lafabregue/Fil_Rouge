<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021091611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD cat_parent_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668126EFEAA FOREIGN KEY (cat_parent_id_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_3AF34668126EFEAA ON categories (cat_parent_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668126EFEAA');
        $this->addSql('DROP INDEX IDX_3AF34668126EFEAA ON categories');
        $this->addSql('ALTER TABLE categories DROP cat_parent_id_id');
    }
}
