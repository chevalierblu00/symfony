<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216091744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, picture_url VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, sctok INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_categories_produit (produit_id INT NOT NULL, categories_produit_id INT NOT NULL, INDEX IDX_324FB0F0F347EFB (produit_id), INDEX IDX_324FB0F0AEBA3EF3 (categories_produit_id), PRIMARY KEY(produit_id, categories_produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_categories_produit ADD CONSTRAINT FK_324FB0F0F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_categories_produit ADD CONSTRAINT FK_324FB0F0AEBA3EF3 FOREIGN KEY (categories_produit_id) REFERENCES categories_produit (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_categories_produit DROP FOREIGN KEY FK_324FB0F0F347EFB');
        $this->addSql('ALTER TABLE produit_categories_produit DROP FOREIGN KEY FK_324FB0F0AEBA3EF3');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_categories_produit');
    }
}
