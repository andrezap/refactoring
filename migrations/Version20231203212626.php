<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231203212626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE purchase (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, number VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, CONSTRAINT FK_6117D13BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_6117D13BA76ED395 ON purchase (user_id)');
        $this->addSql('CREATE TABLE purchase_item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, purchase_id INTEGER DEFAULT NULL, item_id INTEGER DEFAULT NULL, quantity INTEGER NOT NULL, CONSTRAINT FK_6FA8ED7D558FBEB9 FOREIGN KEY (purchase_id) REFERENCES purchase (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6FA8ED7D126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_6FA8ED7D558FBEB9 ON purchase_item (purchase_id)');
        $this->addSql('CREATE INDEX IDX_6FA8ED7D126F525E ON purchase_item (item_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, date_of_birth VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE purchase');
        $this->addSql('DROP TABLE purchase_item');
        $this->addSql('DROP TABLE user');
    }
}
