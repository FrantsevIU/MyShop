<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325195751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
        CREATE TABLE IF NOT EXISTS ip_user
        (
            id INT AUTO_INCREMENT PRIMARY KEY ,
            user_id INT NOT NULL ,
            ip BIGINT UNSIGNED  NOT NULL ,
            created_at DATETIME NOT NULL DEFAULT now(),
            CONSTRAINT 
            FOREIGN KEY (user_id) REFERENCES users(id)
        ) ENGINE = innoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
        ");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE ip_user');
    }
}
