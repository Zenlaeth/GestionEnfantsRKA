<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209141650 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque_vacances ADD che_moyen_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cheque_vacances ADD CONSTRAINT FK_AF5510F45D3DFF39 FOREIGN KEY (che_moyen_id) REFERENCES moyen_paiement (id)');
        $this->addSql('CREATE INDEX IDX_AF5510F45D3DFF39 ON cheque_vacances (che_moyen_id)');
        $this->addSql('ALTER TABLE especes ADD esp_moyen_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE especes ADD CONSTRAINT FK_A769EEB0FE5053FA FOREIGN KEY (esp_moyen_id) REFERENCES moyen_paiement (id)');
        $this->addSql('CREATE INDEX IDX_A769EEB0FE5053FA ON especes (esp_moyen_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cheque_vacances DROP FOREIGN KEY FK_AF5510F45D3DFF39');
        $this->addSql('DROP INDEX IDX_AF5510F45D3DFF39 ON cheque_vacances');
        $this->addSql('ALTER TABLE cheque_vacances DROP che_moyen_id');
        $this->addSql('ALTER TABLE especes DROP FOREIGN KEY FK_A769EEB0FE5053FA');
        $this->addSql('DROP INDEX IDX_A769EEB0FE5053FA ON especes');
        $this->addSql('ALTER TABLE especes DROP esp_moyen_id');
    }
}
