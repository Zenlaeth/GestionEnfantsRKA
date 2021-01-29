<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127123949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel ADD mat_auteur_id INT DEFAULT NULL, ADD mat_libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091750A5B39 FOREIGN KEY (mat_auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_18D2B091750A5B39 ON materiel (mat_auteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091750A5B39');
        $this->addSql('DROP INDEX IDX_18D2B091750A5B39 ON materiel');
        $this->addSql('ALTER TABLE materiel DROP mat_auteur_id, DROP mat_libelle');
    }
}
