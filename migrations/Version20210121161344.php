<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121161344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modification_facturation (id INT AUTO_INCREMENT NOT NULL, facenfant_id INT NOT NULL, fac_moyen_paiement_id INT DEFAULT NULL, fac_tarif_id INT DEFAULT NULL, fac_statut_id INT DEFAULT NULL, modif_auteur_id INT DEFAULT NULL, fac_code INT NOT NULL, fac_option_paiement INT NOT NULL, fac_total DOUBLE PRECISION DEFAULT NULL, INDEX IDX_33998112B434C88B (facenfant_id), INDEX IDX_339981126169239B (fac_moyen_paiement_id), INDEX IDX_33998112EA85A29B (fac_tarif_id), INDEX IDX_3399811283956230 (fac_statut_id), INDEX IDX_33998112BED71370 (modif_auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modification_facturation ADD CONSTRAINT FK_33998112B434C88B FOREIGN KEY (facenfant_id) REFERENCES enfant (id)');
        $this->addSql('ALTER TABLE modification_facturation ADD CONSTRAINT FK_339981126169239B FOREIGN KEY (fac_moyen_paiement_id) REFERENCES moyen_paiement (id)');
        $this->addSql('ALTER TABLE modification_facturation ADD CONSTRAINT FK_33998112EA85A29B FOREIGN KEY (fac_tarif_id) REFERENCES tarif (id)');
        $this->addSql('ALTER TABLE modification_facturation ADD CONSTRAINT FK_3399811283956230 FOREIGN KEY (fac_statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE modification_facturation ADD CONSTRAINT FK_33998112BED71370 FOREIGN KEY (modif_auteur_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE modification_facturation');
    }
}
