<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905092242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON fabricant');
        $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON marque');
        $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON pays');
        $this->addSql('DROP INDEX UNIQ_871959C26C6E55B5 ON typebiere');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_899DDA2D7294869C');
        $this->addSql('DROP INDEX idx_899dda2d7294869c ON vente');
        $this->addSql('CREATE INDEX IDX_888A2A4C7294869C ON vente (article_id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_899DDA2D7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON fabricant (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON marque (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON pays (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_871959C26C6E55B5 ON typebiere (name)');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C7294869C');
        $this->addSql('DROP INDEX idx_888a2a4c7294869c ON vente');
        $this->addSql('CREATE INDEX IDX_899DDA2D7294869C ON vente (article_id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
    }
}
