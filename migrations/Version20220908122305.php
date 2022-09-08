<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908122305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pilot ADD fk_car_id INT DEFAULT NULL, ADD avatar VARCHAR(255) DEFAULT NULL, ADD wallet INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pilot ADD CONSTRAINT FK_8D1E5F52E3689E0F FOREIGN KEY (fk_car_id) REFERENCES car (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D1E5F52E3689E0F ON pilot (fk_car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pilot DROP FOREIGN KEY FK_8D1E5F52E3689E0F');
        $this->addSql('DROP INDEX UNIQ_8D1E5F52E3689E0F ON pilot');
        $this->addSql('ALTER TABLE pilot DROP fk_car_id, DROP avatar, DROP wallet');
    }
}
