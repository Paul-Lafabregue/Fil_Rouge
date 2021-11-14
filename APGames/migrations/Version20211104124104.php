<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104124104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, cat_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id VARCHAR(2) NOT NULL, cou_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, ord_order_date DATETIME NOT NULL, ord_payment_date DATETIME DEFAULT NULL, ord_status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_details (id INT AUTO_INCREMENT NOT NULL, ode_ord_id INT NOT NULL, ode_pro_id INT NOT NULL, ode_unit_price NUMERIC(7, 2) NOT NULL, ode_quantity INT NOT NULL, ode_discount INT DEFAULT NULL, INDEX IDX_835379F1D88BA2F4 (ode_ord_id), INDEX IDX_835379F1FD0A95BB (ode_pro_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, pro_sup_id INT NOT NULL, pro_sub_cat_id INT DEFAULT NULL, pro_name VARCHAR(50) NOT NULL, pro_price NUMERIC(7, 2) DEFAULT NULL, pro_vat NUMERIC(7, 2) DEFAULT NULL, pro_ref VARCHAR(50) NOT NULL, pro_stock INT DEFAULT NULL, pro_wording VARCHAR(255) DEFAULT NULL, pro_description LONGTEXT DEFAULT NULL, pro_picture VARCHAR(7) DEFAULT NULL, pro_date_add DATETIME NOT NULL, pro_date_modif DATETIME DEFAULT NULL, INDEX IDX_B3BA5A5A597B819A (pro_sup_id), INDEX IDX_B3BA5A5AE78A57AF (pro_sub_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcategories (id INT AUTO_INCREMENT NOT NULL, cat_id INT DEFAULT NULL, sub_cat_name VARCHAR(50) NOT NULL, INDEX IDX_6562A1CBE6ADA943 (cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suppliers (id INT AUTO_INCREMENT NOT NULL, cou_id VARCHAR(2) NOT NULL, sup_company_name VARCHAR(255) NOT NULL, sup_contact_name VARCHAR(50) DEFAULT NULL, sup_address VARCHAR(255) DEFAULT NULL, sup_zipcode INT NOT NULL, sup_city VARCHAR(50) NOT NULL, sup_phone VARCHAR(15) DEFAULT NULL, sup_mail VARCHAR(255) DEFAULT NULL, INDEX IDX_AC28B95CE1217047 (cou_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1D88BA2F4 FOREIGN KEY (ode_ord_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders_details ADD CONSTRAINT FK_835379F1FD0A95BB FOREIGN KEY (ode_pro_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A597B819A FOREIGN KEY (pro_sup_id) REFERENCES suppliers (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AE78A57AF FOREIGN KEY (pro_sub_cat_id) REFERENCES subcategories (id)');
        $this->addSql('ALTER TABLE subcategories ADD CONSTRAINT FK_6562A1CBE6ADA943 FOREIGN KEY (cat_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE suppliers ADD CONSTRAINT FK_AC28B95CE1217047 FOREIGN KEY (cou_id) REFERENCES countries (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subcategories DROP FOREIGN KEY FK_6562A1CBE6ADA943');
        $this->addSql('ALTER TABLE suppliers DROP FOREIGN KEY FK_AC28B95CE1217047');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1D88BA2F4');
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1FD0A95BB');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AE78A57AF');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A597B819A');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_details');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE subcategories');
        $this->addSql('DROP TABLE suppliers');
    }
}
