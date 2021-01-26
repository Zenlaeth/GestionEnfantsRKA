<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126131347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE representant_legal (id INT AUTO_INCREMENT NOT NULL, repr_nom VARCHAR(255) NOT NULL, repr_prenom VARCHAR(255) NOT NULL, repr_adresse VARCHAR(255) NOT NULL, repr_tel VARCHAR(255) NOT NULL, repr_mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enfant ADD enf_parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enfant ADD CONSTRAINT FK_34B70CA2B9C6CFB9 FOREIGN KEY (enf_parent_id) REFERENCES representant_legal (id)');
        $this->addSql('CREATE INDEX IDX_34B70CA2B9C6CFB9 ON enfant (enf_parent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enfant DROP FOREIGN KEY FK_34B70CA2B9C6CFB9');
        $this->addSql('DROP TABLE representant_legal');
        $this->addSql('DROP INDEX IDX_34B70CA2B9C6CFB9 ON enfant');
        $this->addSql('ALTER TABLE enfant DROP enf_parent_id');
    }
}
