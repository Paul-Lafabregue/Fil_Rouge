<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025071744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE countries CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE particuliars CHANGE cou_id_id cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE products CHANGE pro_date_modif pro_date_modif DATETIME NOT NULL');
        $this->addSql('ALTER TABLE professionals CHANGE cou_id_id cou_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE suppliers CHANGE cou_id_id cou_id_id INT NOT NULL, CHANGE sup_type sup_type VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE countries CHANGE id id CHAR(2) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE particuliars CHANGE cou_id_id cou_id_id CHAR(2) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE products CHANGE pro_date_modif pro_date_modif DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals CHANGE cou_id_id cou_id_id CHAR(2) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE suppliers CHANGE cou_id_id cou_id_id CHAR(2) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sup_type sup_type CHAR(2) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
