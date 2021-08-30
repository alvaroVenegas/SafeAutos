<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719192816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maintenance ADD id_vehicle_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9F1D99706 FOREIGN KEY (id_vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('CREATE INDEX IDX_2F84F8E9F1D99706 ON maintenance (id_vehicle_id)');
        $this->addSql('ALTER TABLE vehicle ADD id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1B80E48679F37AE5 ON vehicle (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9F1D99706');
        $this->addSql('DROP INDEX IDX_2F84F8E9F1D99706 ON maintenance');
        $this->addSql('ALTER TABLE maintenance DROP id_vehicle_id');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48679F37AE5');
        $this->addSql('DROP INDEX IDX_1B80E48679F37AE5 ON vehicle');
        $this->addSql('ALTER TABLE vehicle DROP id_user_id');
    }
}
