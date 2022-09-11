<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908180914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property_value ADD CONSTRAINT FK_DB649939B483587C FOREIGN KEY (propertyid) REFERENCES properties_products (id)');
        $this->addSql('CREATE INDEX IDX_DB649939B483587C ON property_value (propertyid)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property_value DROP FOREIGN KEY FK_DB649939B483587C');
        $this->addSql('DROP INDEX IDX_DB649939B483587C ON property_value');
    }
}
