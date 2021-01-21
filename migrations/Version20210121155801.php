<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121155801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annulation_facturation ADD annu_auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annulation_facturation ADD CONSTRAINT FK_113BDFD4B4C7265C FOREIGN KEY (annu_auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_113BDFD4B4C7265C ON annulation_facturation (annu_auteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annulation_facturation DROP FOREIGN KEY FK_113BDFD4B4C7265C');
        $this->addSql('DROP INDEX IDX_113BDFD4B4C7265C ON annulation_facturation');
        $this->addSql('ALTER TABLE annulation_facturation DROP annu_auteur_id');
    }
}
