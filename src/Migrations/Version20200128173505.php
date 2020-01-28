<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200128173505 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE shop_tires (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, width INT NOT NULL, rim_diameter VARCHAR(255) NOT NULL, traction_rating VARCHAR(255) DEFAULT NULL, tire_profile INT NOT NULL, temperature_rating VARCHAR(2) DEFAULT NULL, thread_rating INT DEFAULT NULL, current_thread INT DEFAULT NULL, price NUMERIC(7, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE VehicleModelYear');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE VehicleModelYear (id INT UNSIGNED AUTO_INCREMENT NOT NULL, year INT UNSIGNED NOT NULL, make VARCHAR(50) DEFAULT NULL COLLATE utf8_general_ci, model VARCHAR(50) NOT NULL COLLATE utf8_general_ci, INDEX I_VehicleModelYear_make (make), INDEX I_VehicleModelYear_model (model), INDEX I_VehicleModelYear_year (year), UNIQUE INDEX U_VehicleModelYear_year_make_model (year, make, model), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE shop_tires');
    }
}
