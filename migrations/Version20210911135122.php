<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210911135122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aliments (id INT AUTO_INCREMENT NOT NULL, animaux_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, quantite INT NOT NULL, prix_unitaire INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B7C2C9DCA9DAECAA (animaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animaux (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concerne (id INT AUTO_INCREMENT NOT NULL, maladie_id INT NOT NULL, medicaments_id INT DEFAULT NULL, profil_id INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_37FF4F7BB4B1C397 (maladie_id), INDEX IDX_37FF4F7BC403D7FB (medicaments_id), INDEX IDX_37FF4F7B275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE englobe (id INT AUTO_INCREMENT NOT NULL, maladie_id INT NOT NULL, medicaments_id INT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_566211FB4B1C397 (maladie_id), INDEX IDX_566211FC403D7FB (medicaments_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladies (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, symptomes LONGTEXT NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicaments (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, user_p_id INT NOT NULL, somme INT NOT NULL, photo_justificatif LONGTEXT DEFAULT NULL, cout_envoi INT NOT NULL, date_envoi DATETIME NOT NULL, INDEX IDX_B1DC7A1EA9FA2F6B (user_p_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, animal_id INT NOT NULL, code VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, sexe VARCHAR(255) DEFAULT NULL, poids INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E6D6B2978E962C16 (animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, sexe VARCHAR(30) NOT NULL, photo LONGTEXT DEFAULT NULL, date_naissance DATE DEFAULT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aliments ADD CONSTRAINT FK_B7C2C9DCA9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id)');
        $this->addSql('ALTER TABLE concerne ADD CONSTRAINT FK_37FF4F7BB4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladies (id)');
        $this->addSql('ALTER TABLE concerne ADD CONSTRAINT FK_37FF4F7BC403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicaments (id)');
        $this->addSql('ALTER TABLE concerne ADD CONSTRAINT FK_37FF4F7B275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE englobe ADD CONSTRAINT FK_566211FB4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladies (id)');
        $this->addSql('ALTER TABLE englobe ADD CONSTRAINT FK_566211FC403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicaments (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EA9FA2F6B FOREIGN KEY (user_p_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2978E962C16 FOREIGN KEY (animal_id) REFERENCES animaux (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliments DROP FOREIGN KEY FK_B7C2C9DCA9DAECAA');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2978E962C16');
        $this->addSql('ALTER TABLE concerne DROP FOREIGN KEY FK_37FF4F7BB4B1C397');
        $this->addSql('ALTER TABLE englobe DROP FOREIGN KEY FK_566211FB4B1C397');
        $this->addSql('ALTER TABLE concerne DROP FOREIGN KEY FK_37FF4F7BC403D7FB');
        $this->addSql('ALTER TABLE englobe DROP FOREIGN KEY FK_566211FC403D7FB');
        $this->addSql('ALTER TABLE concerne DROP FOREIGN KEY FK_37FF4F7B275ED078');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1EA9FA2F6B');
        $this->addSql('DROP TABLE aliments');
        $this->addSql('DROP TABLE animaux');
        $this->addSql('DROP TABLE concerne');
        $this->addSql('DROP TABLE englobe');
        $this->addSql('DROP TABLE maladies');
        $this->addSql('DROP TABLE medicaments');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE `user`');
    }
}
