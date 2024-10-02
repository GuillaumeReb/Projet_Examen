<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826131414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_3C0D87E56C6E55B5 ON couleur');
        $this->addSql('ALTER TABLE couleur ADD name VARCHAR(255) NOT NULL, CHANGE nom articles VARCHAR(25) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C0D87E5BFDD3168 ON couleur (articles)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_3C0D87E5BFDD3168 ON couleur');
        $this->addSql('ALTER TABLE couleur DROP name, CHANGE articles nom VARCHAR(25) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C0D87E56C6E55B5 ON couleur (nom)');
    }
}
