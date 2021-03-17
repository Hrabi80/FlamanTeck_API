<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306002819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', lien_util VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C744045592FC23A8 (username_canonical), UNIQUE INDEX UNIQ_C7440455A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_C7440455C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('ALTER TABLE for_rent CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE main_img main_img VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL, CHANGE piece piece INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localisation CHANGE gover gover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE techn CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE for_rent_m CHANGE main_img main_img VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL, CHANGE piece piece INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE icon icon VARCHAR(255) DEFAULT NULL, CHANGE icon2 icon2 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE transport CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE housenm_id housenm_id INT DEFAULT NULL, CHANGE salle_id_id salle_id_id INT DEFAULT NULL, CHANGE bus bus INT DEFAULT NULL, CHANGE metro metro INT DEFAULT NULL, CHANGE train train INT DEFAULT NULL, CHANGE louage louage INT DEFAULT NULL, CHANGE louage_m louage_m INT DEFAULT NULL, CHANGE bus_st bus_st VARCHAR(255) DEFAULT NULL, CHANGE metro_st metro_st VARCHAR(255) DEFAULT NULL, CHANGE train_st train_st VARCHAR(255) DEFAULT NULL, CHANGE louage_st louage_st VARCHAR(255) DEFAULT NULL, CHANGE taxi_st taxi_st VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter CHANGE date date VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE portfolio CHANGE domaine domaine VARCHAR(255) DEFAULT NULL, CHANGE client client VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE cuisine CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE refri refri TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE cuisine_salle CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE boite boite TINYINT(1) DEFAULT NULL, CHANGE interphone interphone TINYINT(1) DEFAULT NULL, CHANGE lavelange lavelange TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE couchage CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canapelit canapelit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle CHANGE mail mail VARCHAR(255) DEFAULT NULL, CHANGE responsable responsable VARCHAR(255) DEFAULT NULL, CHANGE main main VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ameublement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canape canape INT DEFAULT NULL, CHANGE my_tv my_tv INT DEFAULT NULL');
        $this->addSql('ALTER TABLE to_buy CHANGE surface surface DOUBLE PRECISION DEFAULT NULL, CHANGE mainIMG mainIMG VARCHAR(255) DEFAULT NULL, CHANGE cover cover VARCHAR(255) DEFAULT NULL, CHANGE piece piece INT DEFAULT NULL');
        $this->addSql('ALTER TABLE map CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE housenm_id housenm_id INT DEFAULT NULL, CHANGE salle_id_id salle_id_id INT DEFAULT NULL, CHANGE map map VARCHAR(800) DEFAULT NULL, CHANGE virtual_tour virtual_tour VARCHAR(800) DEFAULT NULL');
        $this->addSql('ALTER TABLE vcar CHANGE id_house_id id_house_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE housenm_id housenm_id INT DEFAULT NULL, CHANGE cave cave TINYINT(1) DEFAULT NULL, CHANGE ascenceur ascenceur TINYINT(1) DEFAULT NULL, CHANGE gardienne gardienne TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE equip_salle CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materiel CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE devis CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE tel tel INT DEFAULT NULL, CHANGE service1 service1 VARCHAR(255) DEFAULT NULL, CHANGE service2 service2 VARCHAR(255) DEFAULT NULL, CHANGE service3 service3 VARCHAR(255) DEFAULT NULL, CHANGE service4 service4 VARCHAR(255) DEFAULT NULL, CHANGE service5 service5 VARCHAR(255) DEFAULT NULL, CHANGE service6 service6 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, id_house_id INT NOT NULL, first_cover VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sec_cover VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, thir_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, four_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, five_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, sex_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, seven_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, eight_cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_472B783A3B6CA980 (id_house_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A3B6CA980 FOREIGN KEY (id_house_id) REFERENCES to_buy (id)');
        $this->addSql('DROP TABLE client');
        $this->addSql('ALTER TABLE ameublement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canape canape INT DEFAULT NULL, CHANGE my_tv my_tv INT DEFAULT NULL');
        $this->addSql('ALTER TABLE couchage CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE canapelit canapelit INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cuisine CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE refri refri TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE cuisine_salle CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE devis CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel INT DEFAULT NULL, CHANGE service1 service1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service2 service2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service3 service3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service4 service4 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service5 service5 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE service6 service6 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equip_salle CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipement CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE boite boite TINYINT(1) DEFAULT \'NULL\', CHANGE interphone interphone TINYINT(1) DEFAULT \'NULL\', CHANGE lavelange lavelange TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE for_rent CHANGE city city VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE main_img main_img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cover cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE piece piece INT DEFAULT NULL');
        $this->addSql('ALTER TABLE for_rent_m CHANGE main_img main_img VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cover cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE piece piece INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localisation CHANGE gover gover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE map CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE housenm_id housenm_id INT DEFAULT NULL, CHANGE salle_id_id salle_id_id INT DEFAULT NULL, CHANGE map map VARCHAR(800) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE virtual_tour virtual_tour VARCHAR(800) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE materiel CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter CHANGE date date VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE portfolio CHANGE domaine domaine VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE client client VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(2255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE salle CHANGE mail mail VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE responsable responsable VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE main main VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cover cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE service CHANGE icon icon VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE icon2 icon2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE techn CHANGE salle_id_id salle_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE to_buy CHANGE surface surface DOUBLE PRECISION DEFAULT \'NULL\', CHANGE mainIMG mainIMG VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE cover cover VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE piece piece INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transport CHANGE house_id_id house_id_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE housenm_id housenm_id INT DEFAULT NULL, CHANGE salle_id_id salle_id_id INT DEFAULT NULL, CHANGE bus bus INT DEFAULT NULL, CHANGE metro metro INT DEFAULT NULL, CHANGE train train INT DEFAULT NULL, CHANGE louage louage INT DEFAULT NULL, CHANGE louage_m louage_m INT DEFAULT NULL, CHANGE bus_st bus_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE metro_st metro_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE train_st train_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE louage_st louage_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE taxi_st taxi_st VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE vcar CHANGE id_house_id id_house_id INT DEFAULT NULL, CHANGE house_lm_id_id house_lm_id_id INT DEFAULT NULL, CHANGE housenm_id housenm_id INT DEFAULT NULL, CHANGE cave cave TINYINT(1) DEFAULT \'NULL\', CHANGE ascenceur ascenceur TINYINT(1) DEFAULT \'NULL\', CHANGE gardienne gardienne TINYINT(1) DEFAULT \'NULL\'');
    }
}
