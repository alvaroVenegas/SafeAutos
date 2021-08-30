<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210718162451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, kms_mant INT DEFAULT NULL, date_mant DATE DEFAULT NULL, tyres VARCHAR(64) DEFAULT NULL, brakes VARCHAR(64) DEFAULT NULL, shocks_absorber VARCHAR(64) DEFAULT NULL, oil VARCHAR(64) DEFAULT NULL, oil_filter TINYINT(1) DEFAULT NULL, fuel_filter TINYINT(1) DEFAULT NULL, cabin_filter TINYINT(1) DEFAULT NULL, air_filter TINYINT(1) DEFAULT NULL, itv DATE DEFAULT NULL, timing_belt TINYINT(1) DEFAULT NULL, battery TINYINT(1) DEFAULT NULL, ac TINYINT(1) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE maintenance');
    }
}
