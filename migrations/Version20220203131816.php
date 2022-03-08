<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203131816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE itemproduct DROP FOREIGN KEY FK_AC8096E1C83F53CA');
        $this->addSql('DROP INDEX IDX_AC8096E1C83F53CA ON itemproduct');
        $this->addSql('ALTER TABLE itemproduct CHANGE parrent_id CategoryId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE itemproduct ADD CONSTRAINT FK_AC8096E1D36A08A1 FOREIGN KEY (CategoryId) REFERENCES category_id (id)');
        $this->addSql('CREATE INDEX IDX_AC8096E1D36A08A1 ON itemproduct (CategoryId)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE itemproduct DROP FOREIGN KEY FK_AC8096E1D36A08A1');
        $this->addSql('DROP INDEX IDX_AC8096E1D36A08A1 ON itemproduct');
        $this->addSql('ALTER TABLE itemproduct CHANGE categoryid parrent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE itemproduct ADD CONSTRAINT FK_AC8096E1C83F53CA FOREIGN KEY (parrent_id) REFERENCES category_id (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AC8096E1C83F53CA ON itemproduct (parrent_id)');
    }
}
