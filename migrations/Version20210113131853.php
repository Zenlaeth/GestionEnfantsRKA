<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113131853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enfant ADD enf_nom VARCHAR(255) NOT NULL, ADD enf_prenom VARCHAR(255) NOT NULL, DROP nom, DROP prenom, CHANGE age enf_auteur_id INT NOT NULL, CHANGE note enf_note INT DEFAULT NULL, CHANGE description enf_description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2AB076A2F FOREIGN KEY (enf_auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_34B70CA2AB076A2F ON enfant (enf_auteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2AB076A2F');
        $this->addSql('DROP INDEX IDX_34B70CA2AB076A2F ON enfant');
        $this->addSql('ALTER TABLE enfant ADD nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP enf_nom, DROP enf_prenom, CHANGE enf_auteur_id age INT NOT NULL, CHANGE enf_note note INT DEFAULT NULL, CHANGE enf_description description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
