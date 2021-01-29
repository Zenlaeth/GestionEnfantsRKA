<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126143431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representant_legal ADD repr_auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE representant_legal ADD CONSTRAINT FK_51277FD385CFAB29 FOREIGN KEY (repr_auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_51277FD385CFAB29 ON representant_legal (repr_auteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representant_legal DROP FOREIGN KEY FK_51277FD385CFAB29');
        $this->addSql('DROP INDEX IDX_51277FD385CFAB29 ON representant_legal');
        $this->addSql('ALTER TABLE representant_legal DROP repr_auteur_id');
    }
}
