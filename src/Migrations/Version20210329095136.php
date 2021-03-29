<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329095136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABBB52753FC');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212EB52753FC');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD3B52753FC');
        $this->addSql('ALTER TABLE ameublement DROP FOREIGN KEY FK_350B9302A4A739AF');
        $this->addSql('ALTER TABLE couchage DROP FOREIGN KEY FK_6326C39EA4A739AF');
        $this->addSql('ALTER TABLE cuisine DROP FOREIGN KEY FK_10D52C6BA4A739AF');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3A4A739AF');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABB2F2B2F8F');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212E2F2B2F8F');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD32F2B2F8F');
        $this->addSql('ALTER TABLE cuisine_salle DROP FOREIGN KEY FK_AF01458792419D3E');
        $this->addSql('ALTER TABLE equip_salle DROP FOREIGN KEY FK_BF1ABB7292419D3E');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABB92419D3E');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B09192419D3E');
        $this->addSql('ALTER TABLE techn DROP FOREIGN KEY FK_8B376EAA92419D3E');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212E92419D3E');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A3B6CA980');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABBA4A739AF');
        $this->addSql('ALTER TABLE transport DROP FOREIGN KEY FK_66AB212EA4A739AF');
        $this->addSql('ALTER TABLE vcar DROP FOREIGN KEY FK_E76C1FD33B6CA980');
        $this->addSql('DROP TABLE ameublement');
        $this->addSql('DROP TABLE couchage');
        $this->addSql('DROP TABLE cuisine');
        $this->addSql('DROP TABLE cuisine_salle');
        $this->addSql('DROP TABLE equip_salle');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE for_rent');
        $this->addSql('DROP TABLE for_rent_m');
        $this->addSql('DROP TABLE front');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE techn');
        $this->addSql('DROP TABLE to_buy');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE vcar');
        $this->addSql('ALTER TABLE client CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE lien_util lien_util VARCHAR(255) DEFAULT NULL, CHANGE tel tel VARCHAR(255) DEFAULT NULL, CHANGE lien lien VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE tel tel VARCHAR(255) DEFAULT NULL, CHANGE lien lien VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE icon icon VARCHAR(255) DEFAULT NULL, CHANGE icon2 icon2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter CHANGE date date VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE portfolio CHANGE domaine domaine VARCHAR(255) DEFAULT NULL, CHANGE client client VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE date date VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE devis CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE tel tel INT DEFAULT NULL, CHANGE service1 service1 VARCHAR(255) DEFAULT NULL, CHANGE service2 service2 VARCHAR(255) DEFAULT NULL, CHANGE service3 service3 VARCHAR(255) DEFAULT NULL, CHANGE service4 service4 VARCHAR(255) DEFAULT NULL, CHANGE service5 service5 VARCHAR(255) DEFAULT NULL, CHANGE service6 service6 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ameublement (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, canape INT DEFAULT NULL, mytable INT NOT NULL, chaise INT NOT NULL, my_tv INT DEFAULT NULL, bureau INT NOT NULL, dressing INT NOT NULL, UNIQUE INDEX UNIQ_350B9302A4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE couchage (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, lit INT NOT NULL, doublelit INT NOT NULL, canapelit INT DEFAULT NULL, UNIQUE INDEX UNIQ_6326C39EA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cuisine (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, four TINYINT(1) NOT NULL, plaque TINYINT(1) NOT NULL, lave TINYINT(1) NOT NULL, congelateur TINYINT(1) NOT NULL, refri TINYINT(1) DEFAULT \'NULL\', microonde TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_10D52C6BA4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cuisine_salle (id INT AUTO_INCREMENT NOT NULL, salle_id_id INT DEFAULT NULL, four TINYINT(1) NOT NULL, plaque TINYINT(1) NOT NULL, frigo TINYINT(1) NOT NULL, bac TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_AF01458792419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE equip_salle (id INT AUTO_INCREMENT NOT NULL, salle_id_id INT DEFAULT NULL, eau TINYINT(1) NOT NULL, extincteur TINYINT(1) NOT NULL, telp TINYINT(1) NOT NULL, electrique TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_BF1ABB7292419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, toilette TINYINT(1) NOT NULL, machine TINYINT(1) NOT NULL, internet TINYINT(1) NOT NULL, boite TINYINT(1) DEFAULT \'NULL\', interphone TINYINT(1) DEFAULT \'NULL\', lavelange TINYINT(1) DEFAULT \'NULL\', UNIQUE INDEX UNIQ_B8B4C6F3A4A739AF (house_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE for_rent (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, city VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, surface INT NOT NULL, price DOUBLE PRECISION NOT NULL, room_nb INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description2 LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description3 LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description4 LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, main_img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, piece INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE for_rent_m (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ciy VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, surface DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, room_nb INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description2 LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description3 LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description4 LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, main_img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, piece INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE front (id INT AUTO_INCREMENT NOT NULL, newsletter VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, id_house_id INT NOT NULL, first_cover VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sec_cover VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, thir_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, four_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, five_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, sex_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, seven_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, eight_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_472B783A3B6CA980 (id_house_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, gover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, house_lm_id_id INT DEFAULT NULL, housenm_id INT DEFAULT NULL, salle_id_id INT DEFAULT NULL, map VARCHAR(800) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, virtual_tour VARCHAR(800) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_93ADAABB2F2B2F8F (house_lm_id_id), UNIQUE INDEX UNIQ_93ADAABBB52753FC (housenm_id), UNIQUE INDEX UNIQ_93ADAABBA4A739AF (house_id_id), UNIQUE INDEX UNIQ_93ADAABB92419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, salle_id_id INT DEFAULT NULL, tables INT NOT NULL, chair INT NOT NULL, sono TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_18D2B09192419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, tel INT NOT NULL, adress VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, responsable VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description2 LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description3 LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, surface DOUBLE PRECISION NOT NULL, places INT NOT NULL, city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, main VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE techn (id INT AUTO_INCREMENT NOT NULL, salle_id_id INT DEFAULT NULL, parking TINYINT(1) NOT NULL, horaire VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, bar TINYINT(1) NOT NULL, toilette TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8B376EAA92419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE to_buy (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, surface DOUBLE PRECISION DEFAULT \'NULL\', description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description2 LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description3 LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mainIMG VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION NOT NULL, room_nb INT NOT NULL, piece INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, house_id_id INT DEFAULT NULL, house_lm_id_id INT DEFAULT NULL, housenm_id INT DEFAULT NULL, salle_id_id INT DEFAULT NULL, bus INT DEFAULT NULL, metro INT DEFAULT NULL, train INT DEFAULT NULL, louage INT DEFAULT NULL, louage_m INT DEFAULT NULL, bus_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, metro_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, train_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, louage_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, taxi_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_66AB212E2F2B2F8F (house_lm_id_id), UNIQUE INDEX UNIQ_66AB212EB52753FC (housenm_id), UNIQUE INDEX UNIQ_66AB212EA4A739AF (house_id_id), UNIQUE INDEX UNIQ_66AB212E92419D3E (salle_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vcar (id INT AUTO_INCREMENT NOT NULL, id_house_id INT DEFAULT NULL, house_lm_id_id INT DEFAULT NULL, housenm_id INT DEFAULT NULL, parking TINYINT(1) NOT NULL, garage TINYINT(1) NOT NULL, cave TINYINT(1) DEFAULT \'NULL\', ascenceur TINYINT(1) DEFAULT \'NULL\', etage VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, gardienne TINYINT(1) DEFAULT \'NULL\', UNIQUE INDEX UNIQ_E76C1FD32F2B2F8F (house_lm_id_id), UNIQUE INDEX UNIQ_E76C1FD3B52753FC (housenm_id), UNIQUE INDEX UNIQ_E76C1FD33B6CA980 (id_house_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ameublement ADD CONSTRAINT FK_350B9302A4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE couchage ADD CONSTRAINT FK_6326C39EA4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE cuisine ADD CONSTRAINT FK_10D52C6BA4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE cuisine_salle ADD CONSTRAINT FK_AF01458792419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE equip_salle ADD CONSTRAINT FK_BF1ABB7292419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3A4A739AF FOREIGN KEY (house_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A3B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABB2F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABB92419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABBA4A739AF FOREIGN KEY (house_id_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABBB52753FC FOREIGN KEY (housenm_id) REFERENCES for_rent (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B09192419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE techn ADD CONSTRAINT FK_8B376EAA92419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212E2F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212E92419D3E FOREIGN KEY (salle_id_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212EA4A739AF FOREIGN KEY (house_id_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE transport ADD CONSTRAINT FK_66AB212EB52753FC FOREIGN KEY (housenm_id) REFERENCES for_rent (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD32F2B2F8F FOREIGN KEY (house_lm_id_id) REFERENCES for_rent_m (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD33B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
        $this->addSql('ALTER TABLE vcar ADD CONSTRAINT FK_E76C1FD3B52753FC FOREIGN KEY (housenm_id) REFERENCES for_rent (id)');
        $this->addSql('ALTER TABLE client CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lien lien VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lien_util lien_util VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE date date VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE devis CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel INT DEFAULT NULL, CHANGE service1 service1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service2 service2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service3 service3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service4 service4 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service5 service5 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service6 service6 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE newsletter CHANGE date date VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE portfolio CHANGE domaine domaine VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE client client VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE service CHANGE icon icon VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE icon2 icon2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE lien lien VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
