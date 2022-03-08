<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203131459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_id (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, parrent_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE itemproduct ADD parrent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE itemproduct ADD CONSTRAINT FK_AC8096E1C83F53CA FOREIGN KEY (parrent_id) REFERENCES category_id (id)');
        $this->addSql('CREATE INDEX IDX_AC8096E1C83F53CA ON itemproduct (parrent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE itemproduct DROP FOREIGN KEY FK_AC8096E1C83F53CA');
        $this->addSql('DROP TABLE category_id');
        $this->addSql('DROP INDEX IDX_AC8096E1C83F53CA ON itemproduct');
        $this->addSql('ALTER TABLE itemproduct DROP parrent_id');
    }
}
