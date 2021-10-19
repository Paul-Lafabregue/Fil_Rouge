<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211019121614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_details ADD ode_ord_id_id INT DEFAULT NULL, ADD ode_prod_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C132D79A27 FOREIGN KEY (ode_ord_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1849FA768 FOREIGN KEY (ode_prod_id_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_845CA2C132D79A27 ON order_details (ode_ord_id_id)');
        $this->addSql('CREATE INDEX IDX_845CA2C1849FA768 ON order_details (ode_prod_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C132D79A27');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C1849FA768');
        $this->addSql('DROP INDEX IDX_845CA2C132D79A27 ON order_details');
        $this->addSql('DROP INDEX IDX_845CA2C1849FA768 ON order_details');
        $this->addSql('ALTER TABLE order_details DROP ode_ord_id_id, DROP ode_prod_id_id');
    }
}
