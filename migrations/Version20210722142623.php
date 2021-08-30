<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722142623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, id_vehicle_id INT DEFAULT NULL, kms_mant INT DEFAULT NULL, date_mant DATE DEFAULT NULL, tyres VARCHAR(64) DEFAULT NULL, brakes VARCHAR(64) DEFAULT NULL, shocks_absorber VARCHAR(64) DEFAULT NULL, oil VARCHAR(64) DEFAULT NULL, oil_filter TINYINT(1) DEFAULT NULL, fuel_filter TINYINT(1) DEFAULT NULL, cabin_filter TINYINT(1) DEFAULT NULL, air_filter TINYINT(1) DEFAULT NULL, itv DATE DEFAULT NULL, timing_belt TINYINT(1) DEFAULT NULL, battery TINYINT(1) DEFAULT NULL, ac TINYINT(1) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, INDEX IDX_2F84F8E9F1D99706 (id_vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, alias VARCHAR(64) NOT NULL, avatar LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, mark VARCHAR(64) NOT NULL, model VARCHAR(64) NOT NULL, identification VARCHAR(32) NOT NULL, kms INT DEFAULT NULL, date_itv DATE DEFAULT NULL, image LONGTEXT DEFAULT NULL, INDEX IDX_1B80E48679F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9F1D99706 FOREIGN KEY (id_vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48679F37AE5');
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9F1D99706');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle');
    }
}
