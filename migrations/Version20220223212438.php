<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220223212438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_products RENAME INDEX fk_orders_product_product_id TO IDX_749C879C4584665A');
        $this->addSql('ALTER TABLE carts DROP FOREIGN KEY FK_BA388B7B5F8B771');
        $this->addSql('DROP INDEX IDX_BA388B7B5F8B771 ON carts');
        $this->addSql('ALTER TABLE carts CHANGE itemid product_id INT DEFAULT NULL, CHANGE sessionid session_id VARCHAR(250) DEFAULT NULL');
        $this->addSql('ALTER TABLE carts ADD CONSTRAINT FK_4E004AAC4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_4E004AAC4584665A ON carts (product_id)');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_AC8096E1D36A08A1');
        $this->addSql('DROP INDEX IDX_AC8096E1D36A08A1 ON products');
        $this->addSql('ALTER TABLE products CHANGE number_of_product number_of_product VARCHAR(255) NOT NULL, CHANGE categoryid category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A12469DE2 ON products (category_id)');
        $this->addSql('ALTER TABLE users CHANGE user_firstname user_firstname VARCHAR(255) NOT NULL, CHANGE number_phone number_phone VARCHAR(255) NOT NULL, CHANGE birthday birthday VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_1483A5E9E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carts DROP FOREIGN KEY FK_4E004AAC4584665A');
        $this->addSql('DROP INDEX IDX_4E004AAC4584665A ON carts');
        $this->addSql('ALTER TABLE carts CHANGE product_id itemId INT DEFAULT NULL, CHANGE session_id sessionId VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE carts ADD CONSTRAINT FK_BA388B7B5F8B771 FOREIGN KEY (itemId) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BA388B7B5F8B771 ON carts (itemId)');
        $this->addSql('ALTER TABLE orders_products RENAME INDEX idx_749c879c4584665a TO FK_orders_product_product_id');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('DROP INDEX IDX_B3BA5A5A12469DE2 ON products');
        $this->addSql('ALTER TABLE products CHANGE number_of_product number_of_product INT NOT NULL, CHANGE category_id categoryId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_AC8096E1D36A08A1 FOREIGN KEY (categoryId) REFERENCES categories (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AC8096E1D36A08A1 ON products (categoryId)');
        $this->addSql('ALTER TABLE users CHANGE user_firstname user_firstname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE number_phone number_phone INT DEFAULT NULL, CHANGE birthday birthday DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE users RENAME INDEX uniq_1483a5e9e7927c74 TO UNIQ_8D93D649E7927C74');
    }
}
