<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210175220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_bancaire DROP FOREIGN KEY FK_59E3C22D97DC9813');
        $this->addSql('DROP INDEX IDX_59E3C22D97DC9813 ON carte_bancaire');
        $this->addSql('ALTER TABLE carte_bancaire DROP card_facturation_id');
        $this->addSql('ALTER TABLE cheque DROP FOREIGN KEY FK_A0BBFDE96CD43E92');
        $this->addSql('DROP INDEX IDX_A0BBFDE96CD43E92 ON cheque');
        $this->addSql('ALTER TABLE cheque DROP che_facturation_id');
        $this->addSql('ALTER TABLE cheque_vacances DROP FOREIGN KEY FK_AF5510F4399B7E35');
        $this->addSql('DROP INDEX IDX_AF5510F4399B7E35 ON cheque_vacances');
        $this->addSql('ALTER TABLE cheque_vacances DROP chev_facturation_id');
        $this->addSql('ALTER TABLE especes DROP FOREIGN KEY FK_A769EEB05C0DECF8');
        $this->addSql('DROP INDEX IDX_A769EEB05C0DECF8 ON especes');
        $this->addSql('ALTER TABLE especes DROP esp_facturation_id');
        $this->addSql('ALTER TABLE facturation ADD fac_moyen_cb_id INT DEFAULT NULL, ADD fac_moyen_che_id INT DEFAULT NULL, ADD fac_moyen_chev_id INT DEFAULT NULL, ADD fac_moyen_esp_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513AD458737A FOREIGN KEY (fac_moyen_cb_id) REFERENCES carte_bancaire (id)');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A68B76D96 FOREIGN KEY (fac_moyen_che_id) REFERENCES cheque (id)');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513AC9ABCC0B FOREIGN KEY (fac_moyen_chev_id) REFERENCES cheque_vacances (id)');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513ACE198FB5 FOREIGN KEY (fac_moyen_esp_id) REFERENCES especes (id)');
        $this->addSql('CREATE INDEX IDX_17EB513AD458737A ON facturation (fac_moyen_cb_id)');
        $this->addSql('CREATE INDEX IDX_17EB513A68B76D96 ON facturation (fac_moyen_che_id)');
        $this->addSql('CREATE INDEX IDX_17EB513AC9ABCC0B ON facturation (fac_moyen_chev_id)');
        $this->addSql('CREATE INDEX IDX_17EB513ACE198FB5 ON facturation (fac_moyen_esp_id)');
        $this->addSql('ALTER TABLE materiel CHANGE mat_quantite_perdu mat_quantite_perdu INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte_bancaire ADD card_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte_bancaire ADD CONSTRAINT FK_59E3C22D97DC9813 FOREIGN KEY (card_facturation_id) REFERENCES facturation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_59E3C22D97DC9813 ON carte_bancaire (card_facturation_id)');
        $this->addSql('ALTER TABLE cheque ADD che_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cheque ADD CONSTRAINT FK_A0BBFDE96CD43E92 FOREIGN KEY (che_facturation_id) REFERENCES facturation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A0BBFDE96CD43E92 ON cheque (che_facturation_id)');
        $this->addSql('ALTER TABLE cheque_vacances ADD chev_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cheque_vacances ADD CONSTRAINT FK_AF5510F4399B7E35 FOREIGN KEY (chev_facturation_id) REFERENCES facturation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AF5510F4399B7E35 ON cheque_vacances (chev_facturation_id)');
        $this->addSql('ALTER TABLE especes ADD esp_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE especes ADD CONSTRAINT FK_A769EEB05C0DECF8 FOREIGN KEY (esp_facturation_id) REFERENCES facturation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A769EEB05C0DECF8 ON especes (esp_facturation_id)');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513AD458737A');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A68B76D96');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513AC9ABCC0B');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513ACE198FB5');
        $this->addSql('DROP INDEX IDX_17EB513AD458737A ON facturation');
        $this->addSql('DROP INDEX IDX_17EB513A68B76D96 ON facturation');
        $this->addSql('DROP INDEX IDX_17EB513AC9ABCC0B ON facturation');
        $this->addSql('DROP INDEX IDX_17EB513ACE198FB5 ON facturation');
        $this->addSql('ALTER TABLE facturation DROP fac_moyen_cb_id, DROP fac_moyen_che_id, DROP fac_moyen_chev_id, DROP fac_moyen_esp_id');
        $this->addSql('ALTER TABLE materiel CHANGE mat_quantite_perdu mat_quantite_perdu INT NOT NULL');
    }
}
