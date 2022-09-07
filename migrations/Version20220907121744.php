<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907121744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, cylinder VARCHAR(255) NOT NULL, max_speed INT NOT NULL, estimated_value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championship (id INT AUTO_INCREMENT NOT NULL, fk_races_id INT NOT NULL, score INT DEFAULT NULL, INDEX IDX_EBADDE6AAB86DB92 (fk_races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championship_pilots (championship_id INT NOT NULL, pilots_id INT NOT NULL, INDEX IDX_E9EEF5E594DDBCE9 (championship_id), INDEX IDX_E9EEF5E58062A2AA (pilots_id), PRIMARY KEY(championship_id, pilots_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE circuit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, length INT NOT NULL, difficulty INT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, fk_cars_id INT DEFAULT NULL, is_out TINYINT(1) DEFAULT NULL, INDEX IDX_9F26610B772DC82A (fk_cars_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pilots (id INT AUTO_INCREMENT NOT NULL, fk_id_cars_id INT NOT NULL, fk_id_user_id INT NOT NULL, firstname VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, furious_skill INT NOT NULL, avatar LONGBLOB DEFAULT NULL, wallet INT NOT NULL, UNIQUE INDEX UNIQ_9EE6E18CA9F196E5 (fk_id_cars_id), UNIQUE INDEX UNIQ_9EE6E18C899DB076 (fk_id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, fk_circuit_id INT NOT NULL, date DATE NOT NULL, start_grid JSON NOT NULL, end_grid JSON NOT NULL, UNIQUE INDEX UNIQ_5DBD1EC93F4F485B (fk_circuit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE championship ADD CONSTRAINT FK_EBADDE6AAB86DB92 FOREIGN KEY (fk_races_id) REFERENCES races (id)');
        $this->addSql('ALTER TABLE championship_pilots ADD CONSTRAINT FK_E9EEF5E594DDBCE9 FOREIGN KEY (championship_id) REFERENCES championship (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championship_pilots ADD CONSTRAINT FK_E9EEF5E58062A2AA FOREIGN KEY (pilots_id) REFERENCES pilots (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B772DC82A FOREIGN KEY (fk_cars_id) REFERENCES cars (id)');
        $this->addSql('ALTER TABLE pilots ADD CONSTRAINT FK_9EE6E18CA9F196E5 FOREIGN KEY (fk_id_cars_id) REFERENCES cars (id)');
        $this->addSql('ALTER TABLE pilots ADD CONSTRAINT FK_9EE6E18C899DB076 FOREIGN KEY (fk_id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE races ADD CONSTRAINT FK_5DBD1EC93F4F485B FOREIGN KEY (fk_circuit_id) REFERENCES circuit (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE championship DROP FOREIGN KEY FK_EBADDE6AAB86DB92');
        $this->addSql('ALTER TABLE championship_pilots DROP FOREIGN KEY FK_E9EEF5E594DDBCE9');
        $this->addSql('ALTER TABLE championship_pilots DROP FOREIGN KEY FK_E9EEF5E58062A2AA');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610B772DC82A');
        $this->addSql('ALTER TABLE pilots DROP FOREIGN KEY FK_9EE6E18CA9F196E5');
        $this->addSql('ALTER TABLE pilots DROP FOREIGN KEY FK_9EE6E18C899DB076');
        $this->addSql('ALTER TABLE races DROP FOREIGN KEY FK_5DBD1EC93F4F485B');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE championship');
        $this->addSql('DROP TABLE championship_pilots');
        $this->addSql('DROP TABLE circuit');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE pilots');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
