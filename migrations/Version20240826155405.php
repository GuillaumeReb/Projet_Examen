<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826155405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON fabricant');
        // $this->addSql('ALTER TABLE marque ADD name VARCHAR(255) NOT NULL, DROP nom');
        // $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON pays');

         // Ajouter la nouvelle colonne 'name'
         $this->addSql('ALTER TABLE marque ADD name VARCHAR(255) NOT NULL');

         // Copier les données de 'nom' à 'name'
         $this->addSql('UPDATE marque SET name = nom');
 
         // Supprimer l'ancienne colonne 'nom'
         $this->addSql('ALTER TABLE marque DROP nom');
 
         // Recréer l'index sur la nouvelle colonne 'name' si nécessaire
         $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON marque (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON fabricant (name)');
        // $this->addSql('ALTER TABLE marque ADD nom VARCHAR(40) NOT NULL, DROP name');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON pays (name)');

        // Recréer l'ancienne colonne 'nom'
        $this->addSql('ALTER TABLE marque ADD nom VARCHAR(255) NOT NULL');

        // Copier les données de 'name' à 'nom'
        $this->addSql('UPDATE marque SET nom = name');

        // Supprimer la colonne 'name'
        $this->addSql('ALTER TABLE marque DROP name');

        // Recréer l'index sur l'ancienne colonne 'nom' si nécessaire
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON marque (nom)');
    }
}
