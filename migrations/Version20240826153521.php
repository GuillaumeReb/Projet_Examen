<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826153521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Renomme la colonne nom en name dans la table pays';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('DROP INDEX UNIQ_349F3CAE6C6E55B5 ON pays');
        // $this->addSql('ALTER TABLE pays ADD name VARCHAR(255) NOT NULL, DROP nom');

        // Ajouter la nouvelle colonne 'name'
        $this->addSql('ALTER TABLE pays ADD name VARCHAR(255) NOT NULL');

        // Copier les données de 'nom' à 'name'
        $this->addSql('UPDATE pays SET name = nom');

        // Supprimer l'ancienne colonne 'nom'
        $this->addSql('ALTER TABLE pays DROP nom');

        // Recréer l'index sur la nouvelle colonne 'name' si nécessaire
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON pays (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE pays ADD nom VARCHAR(40) NOT NULL, DROP name');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_349F3CAE6C6E55B5 ON pays (nom)');

         // Recréer l'ancienne colonne 'nom'
         $this->addSql('ALTER TABLE pays ADD nom VARCHAR(255) NOT NULL');

         // Copier les données de 'name' à 'nom'
         $this->addSql('UPDATE pays SET nom = name');
 
         // Supprimer la colonne 'name'
         $this->addSql('ALTER TABLE pays DROP name');
 
         // Recréer l'index sur l'ancienne colonne 'nom' si nécessaire
         $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON pays (nom)');
    }
}
