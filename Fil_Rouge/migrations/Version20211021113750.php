<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021113750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, cat_id_id INT NOT NULL, sup_id_id INT NOT NULL, pro_name VARCHAR(150) NOT NULL, pro_price NUMERIC(10, 4) NOT NULL, pro_vat NUMERIC(2, 2) DEFAULT NULL, pro_ref VARCHAR(100) NOT NULL, pro_stock INT NOT NULL, pro_wording VARCHAR(25) NOT NULL, pro_description LONGTEXT DEFAULT NULL, pro_picture VARCHAR(10) NOT NULL, pro_date_add DATETIME NOT NULL, pro_date_modif DATETIME NOT NULL, INDEX IDX_B3BA5A5AC33F2EBA (cat_id_id), INDEX IDX_B3BA5A5A63417709 (sup_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AC33F2EBA FOREIGN KEY (cat_id_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A63417709 FOREIGN KEY (sup_id_id) REFERENCES suppliers (id)');
        $this->addSql('ALTER TABLE countries CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE particuliars CHANGE cou_id_id cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE professionals CHANGE cou_id_id cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE suppliers CHANGE cou_id_id cou_id_id INT NOT NULL, CHANGE sup_type sup_type TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_details DROP FOREIGN KEY FK_835379F1C19FAEF2');
        $this->addSql('DROP TABLE products');
        $this->addSql('ALTER TABLE countries CHANGE id id CHAR(2) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE particuliars CHANGE cou_id_id cou_id_id CHAR(2) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE professionals CHANGE cou_id_id cou_id_id CHAR(2) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE suppliers CHANGE cou_id_id cou_id_id CHAR(2) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sup_type sup_type CHAR(2) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
