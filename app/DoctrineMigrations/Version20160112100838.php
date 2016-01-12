<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160112100838 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE postal_code ADD locality_id INT UNSIGNED DEFAULT NULL, DROP locality');
        $this->addSql('ALTER TABLE postal_code ADD CONSTRAINT FK_EA98E37688823A92 FOREIGN KEY (locality_id) REFERENCES locality (id)');
        $this->addSql('CREATE INDEX IDX_EA98E37688823A92 ON postal_code (locality_id)');
        $this->addSql('CREATE INDEX code_idx ON postal_code (code)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE postal_code DROP FOREIGN KEY FK_EA98E37688823A92');
        $this->addSql('DROP INDEX IDX_EA98E37688823A92 ON postal_code');
        $this->addSql('DROP INDEX code_idx ON postal_code');
        $this->addSql('ALTER TABLE postal_code ADD locality INT NOT NULL, DROP locality_id');
    }
}
