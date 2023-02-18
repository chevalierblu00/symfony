<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218141921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_categories_produit DROP FOREIGN KEY FK_324FB0F0AEBA3EF3');
        $this->addSql('ALTER TABLE produit_categories_produit DROP FOREIGN KEY FK_324FB0F0F347EFB');
        $this->addSql('DROP TABLE produit_categories_produit');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_categories_produit (produit_id INT NOT NULL, categories_produit_id INT NOT NULL, INDEX IDX_324FB0F0AEBA3EF3 (categories_produit_id), INDEX IDX_324FB0F0F347EFB (produit_id), PRIMARY KEY(produit_id, categories_produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit_categories_produit ADD CONSTRAINT FK_324FB0F0AEBA3EF3 FOREIGN KEY (categories_produit_id) REFERENCES categories_produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_categories_produit ADD CONSTRAINT FK_324FB0F0F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) NOT NULL');
    }
}
