<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021082649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE customers (id INT AUTO_INCREMENT NOT NULL, cus_category TINYINT(1) NOT NULL, cus_payment_type TINYINT(1) NOT NULL, cus_reference VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE particuliars (id INT AUTO_INCREMENT NOT NULL, par_lastname VARCHAR(100) NOT NULL, par_firstname VARCHAR(100) NOT NULL, par_address VARCHAR(150) NOT NULL, par_zipcode VARCHAR(24) NOT NULL, par_city VARCHAR(50) NOT NULL, par_mail VARCHAR(100) NOT NULL, par_phone VARCHAR(24) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionals (id INT AUTO_INCREMENT NOT NULL, prf_company_name VARCHAR(100) NOT NULL, prf_contact_name VARCHAR(150) NOT NULL, prf_address VARCHAR(150) NOT NULL, prf_zipcode VARCHAR(100) NOT NULL, prf_city VARCHAR(50) NOT NULL, prf_mail VARCHAR(150) NOT NULL, prf_phone VARCHAR(24) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE particuliars');
        $this->addSql('DROP TABLE professionals');
    }
}
