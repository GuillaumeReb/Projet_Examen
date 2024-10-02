<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240826160215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON fabricant');
        // $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON marque');
        // $this->addSql('DROP INDEX UNIQ_6CC70C7C6C6E55B5 ON pays');
        // $this->addSql('DROP INDEX UNIQ_871959C26C6E55B5 ON typebiere');
        // $this->addSql('ALTER TABLE typebiere ADD name VARCHAR(255) NOT NULL, DROP nom');

          // Ajouter une nouvelle colonne
          $this->addSql('ALTER TABLE typebiere ADD name VARCHAR(255) NOT NULL');

          // Copier les données de l'ancienne colonne vers la nouvelle
          $this->addSql('UPDATE typebiere SET name = nom');
  
          // Supprimer l'ancienne colonne
          $this->addSql('ALTER TABLE typebiere DROP nom');
  
          // Créer un index unique sur la nouvelle colonne
          $this->addSql('CREATE UNIQUE INDEX UNIQ_871959C26C6E55B5 ON typebiere (name)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON fabricant (name)');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON marque (name)');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_6CC70C7C6C6E55B5 ON pays (name)');
        // $this->addSql('ALTER TABLE typebiere ADD nom VARCHAR(25) NOT NULL, DROP name');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_871959C26C6E55B5 ON typebiere (nom)');

        // Recréer l'ancienne colonne
        $this->addSql('ALTER TABLE typebiere ADD nom VARCHAR(255) NOT NULL');

        // Copier les données de la nouvelle colonne vers l'ancienne
        $this->addSql('UPDATE typebiere SET nom = name');

        // Supprimer la nouvelle colonne
        $this->addSql('ALTER TABLE typebiere DROP name');

        // Recréer l'index unique sur l'ancienne colonne
        $this->addSql('CREATE UNIQUE INDEX UNIQ_871959C26C6E55B5 ON typebiere (nom)');
    }
}
