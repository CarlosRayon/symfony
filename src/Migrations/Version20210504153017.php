<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504153017 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_characteristics ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_characteristics ADD CONSTRAINT FK_42BCB4CB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_42BCB4CB4584665A ON product_characteristics (product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_characteristics DROP FOREIGN KEY FK_42BCB4CB4584665A');
        $this->addSql('DROP INDEX IDX_42BCB4CB4584665A ON product_characteristics');
        $this->addSql('ALTER TABLE product_characteristics DROP product_id');
    }
}
