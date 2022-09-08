<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908090856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B772DC82A');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, cylinder DOUBLE PRECISION NOT NULL, max_speed INT NOT NULL, estimated_value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, races_id INT NOT NULL, pilots_id INT NOT NULL, score INT DEFAULT NULL, INDEX IDX_AB55E24F99AE984C (races_id), UNIQUE INDEX UNIQ_AB55E24F8062A2AA (pilots_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, tournament_id INT DEFAULT NULL, date DATE NOT NULL, start_grid JSON DEFAULT NULL, end_grid JSON DEFAULT NULL, INDEX IDX_DA6FBBAF33D1A3E7 (tournament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournament (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F99AE984C FOREIGN KEY (races_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F8062A2AA FOREIGN KEY (pilots_id) REFERENCES pilot (id)');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAF33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('ALTER TABLE championship_pilot DROP FOREIGN KEY FK_823AA05394DDBCE9');
        $this->addSql('ALTER TABLE championship_pilot DROP FOREIGN KEY FK_823AA053CE55439B');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE championship');
        $this->addSql('DROP TABLE championship_pilot');
        $this->addSql('DROP INDEX IDX_9F26610B772DC82A ON garage');
        $this->addSql('ALTER TABLE garage CHANGE fk_cars_id cars_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B8702F506 FOREIGN KEY (cars_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_9F26610B8702F506 ON garage (cars_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B8702F506');
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, model VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cylinder VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, max_speed INT NOT NULL, estimated_value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE championship (id INT AUTO_INCREMENT NOT NULL, score INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE championship_pilot (championship_id INT NOT NULL, pilot_id INT NOT NULL, INDEX IDX_823AA053CE55439B (pilot_id), INDEX IDX_823AA05394DDBCE9 (championship_id), PRIMARY KEY(championship_id, pilot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE championship_pilot ADD CONSTRAINT FK_823AA05394DDBCE9 FOREIGN KEY (championship_id) REFERENCES championship (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championship_pilot ADD CONSTRAINT FK_823AA053CE55439B FOREIGN KEY (pilot_id) REFERENCES pilot (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F99AE984C');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F8062A2AA');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAF33D1A3E7');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE tournament');
        $this->addSql('DROP INDEX IDX_9F26610B8702F506 ON garage');
        $this->addSql('ALTER TABLE garage CHANGE cars_id fk_cars_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B772DC82A FOREIGN KEY (fk_cars_id) REFERENCES cars (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9F26610B772DC82A ON garage (fk_cars_id)');
    }
}
