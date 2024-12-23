<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240823161203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_871959C27E0E9D47 ON typebiere');
        $this->addSql('ALTER TABLE typebiere CHANGE nom_type nom VARCHAR(25) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_871959C26C6E55B5 ON typebiere (nom)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_871959C26C6E55B5 ON typebiere');
        $this->addSql('ALTER TABLE typebiere CHANGE nom nom_type VARCHAR(25) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_871959C27E0E9D47 ON typebiere (nom_type)');
    }
}
