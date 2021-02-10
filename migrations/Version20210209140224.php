<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209140224 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE especes ADD esp_facturation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE especes ADD CONSTRAINT FK_A769EEB05C0DECF8 FOREIGN KEY (esp_facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE INDEX IDX_A769EEB05C0DECF8 ON especes (esp_facturation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE especes DROP FOREIGN KEY FK_A769EEB05C0DECF8');
        $this->addSql('DROP INDEX IDX_A769EEB05C0DECF8 ON especes');
        $this->addSql('ALTER TABLE especes DROP esp_facturation_id');
    }
}
