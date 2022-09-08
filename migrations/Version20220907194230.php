<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907194230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE championship DROP FOREIGN KEY FK_EBADDE6AAB86DB92');
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championship_pilot (championship_id INT NOT NULL, pilot_id INT NOT NULL, INDEX IDX_823AA05394DDBCE9 (championship_id), INDEX IDX_823AA053CE55439B (pilot_id), PRIMARY KEY(championship_id, pilot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilot (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, driving_skills INT NOT NULL, photogenic_skills INT NOT NULL, UNIQUE INDEX UNIQ_8D1E5F52F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE championship_pilot ADD CONSTRAINT FK_823AA05394DDBCE9 FOREIGN KEY (championship_id) REFERENCES championship (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championship_pilot ADD CONSTRAINT FK_823AA053CE55439B FOREIGN KEY (pilot_id) REFERENCES pilot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pilots DROP FOREIGN KEY FK_9EE6E18CA9F196E5');
        $this->addSql('ALTER TABLE pilots DROP FOREIGN KEY FK_9EE6E18C899DB076');
        $this->addSql('ALTER TABLE championship_pilots DROP FOREIGN KEY FK_E9EEF5E594DDBCE9');
        $this->addSql('ALTER TABLE championship_pilots DROP FOREIGN KEY FK_E9EEF5E58062A2AA');
        $this->addSql('ALTER TABLE races DROP FOREIGN KEY FK_5DBD1EC93F4F485B');
        $this->addSql('DROP TABLE pilots');
        $this->addSql('DROP TABLE championship_pilots');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX IDX_EBADDE6AAB86DB92 ON championship');
        $this->addSql('ALTER TABLE championship DROP fk_races_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pilots (id INT AUTO_INCREMENT NOT NULL, fk_id_cars_id INT NOT NULL, fk_id_user_id INT NOT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nationality VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, furious_skill INT NOT NULL, avatar LONGBLOB DEFAULT NULL, wallet INT NOT NULL, UNIQUE INDEX UNIQ_9EE6E18C899DB076 (fk_id_user_id), UNIQUE INDEX UNIQ_9EE6E18CA9F196E5 (fk_id_cars_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE championship_pilots (championship_id INT NOT NULL, pilots_id INT NOT NULL, INDEX IDX_E9EEF5E58062A2AA (pilots_id), INDEX IDX_E9EEF5E594DDBCE9 (championship_id), PRIMARY KEY(championship_id, pilots_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, fk_circuit_id INT NOT NULL, date DATE NOT NULL, start_grid JSON NOT NULL, end_grid JSON NOT NULL, UNIQUE INDEX UNIQ_5DBD1EC93F4F485B (fk_circuit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pilots ADD CONSTRAINT FK_9EE6E18CA9F196E5 FOREIGN KEY (fk_id_cars_id) REFERENCES cars (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE pilots ADD CONSTRAINT FK_9EE6E18C899DB076 FOREIGN KEY (fk_id_user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE championship_pilots ADD CONSTRAINT FK_E9EEF5E594DDBCE9 FOREIGN KEY (championship_id) REFERENCES championship (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championship_pilots ADD CONSTRAINT FK_E9EEF5E58062A2AA FOREIGN KEY (pilots_id) REFERENCES pilots (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE races ADD CONSTRAINT FK_5DBD1EC93F4F485B FOREIGN KEY (fk_circuit_id) REFERENCES circuit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE championship_pilot DROP FOREIGN KEY FK_823AA05394DDBCE9');
        $this->addSql('ALTER TABLE championship_pilot DROP FOREIGN KEY FK_823AA053CE55439B');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE championship_pilot');
        $this->addSql('DROP TABLE pilot');
        $this->addSql('ALTER TABLE championship ADD fk_races_id INT NOT NULL');
        $this->addSql('ALTER TABLE championship ADD CONSTRAINT FK_EBADDE6AAB86DB92 FOREIGN KEY (fk_races_id) REFERENCES races (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_EBADDE6AAB86DB92 ON championship (fk_races_id)');
    }
}
