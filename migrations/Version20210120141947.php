<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120141947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A30B87F1D');
        $this->addSql('DROP INDEX IDX_17EB513A30B87F1D ON facturation');
        $this->addSql('ALTER TABLE facturation ADD facenfant_id INT DEFAULT NULL, DROP fac_enfant_id');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513AB434C88B FOREIGN KEY (facenfant_id) REFERENCES enfant (id)');
        $this->addSql('CREATE INDEX IDX_17EB513AB434C88B ON facturation (facenfant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513AB434C88B');
        $this->addSql('DROP INDEX IDX_17EB513AB434C88B ON facturation');
        $this->addSql('ALTER TABLE facturation ADD fac_enfant_id INT NOT NULL, DROP facenfant_id');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A30B87F1D FOREIGN KEY (fac_enfant_id) REFERENCES enfant (id)');
        $this->addSql('CREATE INDEX IDX_17EB513A30B87F1D ON facturation (fac_enfant_id)');
    }
}
