<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908154015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, cylinder DOUBLE PRECISION NOT NULL, max_speed INT NOT NULL, estimated_value INT NOT NULL, is_broken TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championship (id INT AUTO_INCREMENT NOT NULL, pilots_id INT NOT NULL, races_id INT NOT NULL, score INT DEFAULT NULL, INDEX IDX_EBADDE6A8062A2AA (pilots_id), INDEX IDX_EBADDE6A99AE984C (races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot (id INT AUTO_INCREMENT NOT NULL, car_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, driving_skills INT NOT NULL, photogenic_skills INT NOT NULL, avatar VARCHAR(255) DEFAULT NULL, wallet INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D1E5F52F85E0677 (username), UNIQUE INDEX UNIQ_8D1E5F52C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, start_grid JSON DEFAULT NULL, end_grid JSON DEFAULT NULL, name VARCHAR(255) NOT NULL, length INT NOT NULL, difficulty INT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE championship ADD CONSTRAINT FK_EBADDE6A8062A2AA FOREIGN KEY (pilots_id) REFERENCES pilot (id)');
        $this->addSql('ALTER TABLE championship ADD CONSTRAINT FK_EBADDE6A99AE984C FOREIGN KEY (races_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE pilot ADD CONSTRAINT FK_8D1E5F52C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE championship DROP FOREIGN KEY FK_EBADDE6A8062A2AA');
        $this->addSql('ALTER TABLE championship DROP FOREIGN KEY FK_EBADDE6A99AE984C');
        $this->addSql('ALTER TABLE pilot DROP FOREIGN KEY FK_8D1E5F52C3C6F69F');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE championship');
        $this->addSql('DROP TABLE pilot');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
