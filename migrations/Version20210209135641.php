<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209135641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cheque_vacances (id INT AUTO_INCREMENT NOT NULL, chev_facturation_id INT DEFAULT NULL, chev_montant INT NOT NULL, chev_validite DATE NOT NULL, chev_annee_emission DATE NOT NULL, chev_nom_titulaire VARCHAR(255) NOT NULL, chev_adresse_titulaire VARCHAR(255) NOT NULL, chev_nom_employeur VARCHAR(255) NOT NULL, chev_adresse_employeur VARCHAR(255) NOT NULL, INDEX IDX_AF5510F4399B7E35 (chev_facturation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE especes (id INT AUTO_INCREMENT NOT NULL, esp_montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (role_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_332CA4DDD60322AC (role_id), INDEX IDX_332CA4DDA76ED395 (user_id), PRIMARY KEY(role_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cheque_vacances ADD CONSTRAINT FK_AF5510F4399B7E35 FOREIGN KEY (chev_facturation_id) REFERENCES facturation (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE carte_bancaire ADD card_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte_bancaire ADD CONSTRAINT FK_59E3C22D97DC9813 FOREIGN KEY (card_facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE INDEX IDX_59E3C22D97DC9813 ON carte_bancaire (card_facturation_id)');
        $this->addSql('ALTER TABLE cheque ADD che_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE96CD43E92 FOREIGN KEY (che_facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE INDEX IDX_A0BBFDE96CD43E92 ON cheque (che_facturation_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499D30A56E');
        $this->addSql('DROP INDEX IDX_8D93D6499D30A56E ON user');
        $this->addSql('ALTER TABLE user DROP roles_user_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cheque_vacances');
        $this->addSql('DROP TABLE especes');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('ALTER TABLE carte_bancaire DROP FOREIGN KEY FK_59E3C22D97DC9813');
        $this->addSql('DROP INDEX IDX_59E3C22D97DC9813 ON carte_bancaire');
        $this->addSql('ALTER TABLE carte_bancaire DROP card_facturation_id');
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE96CD43E92');
        $this->addSql('DROP INDEX IDX_A0BBFDE96CD43E92 ON cheque');
        $this->addSql('ALTER TABLE cheque DROP che_facturation_id');
        $this->addSql('ALTER TABLE user ADD roles_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499D30A56E FOREIGN KEY (roles_user_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499D30A56E ON user (roles_user_id)');
    }
}
