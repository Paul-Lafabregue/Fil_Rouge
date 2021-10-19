<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019075838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE suppliers (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(100) NOT NULL, contact_name VARCHAR(100) NOT NULL, contact_title VARCHAR(100) NOT NULL, address VARCHAR(100) DEFAULT NULL, city VARCHAR(30) DEFAULT NULL, region VARCHAR(25) NOT NULL, postal_code VARCHAR(10) DEFAULT NULL, country VARCHAR(30) DEFAULT NULL, phone VARCHAR(24) NOT NULL, fax VARCHAR(24) DEFAULT NULL, home_page LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE suppliers');
    }
}
