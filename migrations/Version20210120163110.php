<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120163110 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE moyen_paiement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facturation ADD fac_moyen_paiement_id INT DEFAULT NULL, DROP fac_moyen_paiement, CHANGE facenfant_id facenfant_id INT NOT NULL');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A6169239B FOREIGN KEY (fac_moyen_paiement_id) REFERENCES moyen_paiement (id)');
        $this->addSql('CREATE INDEX IDX_17EB513A6169239B ON facturation (fac_moyen_paiement_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A6169239B');
        $this->addSql('DROP TABLE moyen_paiement');
        $this->addSql('DROP INDEX IDX_17EB513A6169239B ON facturation');
        $this->addSql('ALTER TABLE facturation ADD fac_moyen_paiement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP fac_moyen_paiement_id, CHANGE facenfant_id facenfant_id INT DEFAULT NULL');
    }
}
