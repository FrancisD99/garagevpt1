<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213151700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE user user VARCHAR(50) DEFAULT NULL, CHANGE firstname firstname VARCHAR(50) DEFAULT NULL, CHANGE lastname lastname VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE comment CHANGE user user VARCHAR(50) DEFAULT NULL, CHANGE vehicle vehicle VARCHAR(50) DEFAULT NULL, CHANGE content content VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE garage CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE address address VARCHAR(100) DEFAULT NULL, CHANGE phone_number phone_number VARCHAR(100) DEFAULT NULL, CHANGE email email VARCHAR(100) DEFAULT NULL, CHANGE website website VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE opening_hours CHANGE garage garage VARCHAR(255) DEFAULT NULL, CHANGE day_of_week day_of_week VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE user user VARCHAR(50) DEFAULT NULL, CHANGE vehicle vehicle VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE password password VARCHAR(30) DEFAULT NULL, CHANGE username username VARCHAR(50) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE tel tel VARCHAR(50) DEFAULT NULL, CHANGE employee employee VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle CHANGE modelvehicle modelvehicle VARCHAR(50) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle_image CHANGE vehicle vehicle VARCHAR(100) DEFAULT NULL, CHANGE filename filename VARCHAR(255) DEFAULT NULL, CHANGE path path VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin CHANGE user user VARCHAR(50) DEFAULT \'NULL\', CHANGE firstname firstname VARCHAR(50) DEFAULT \'NULL\', CHANGE lastname lastname VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE comment CHANGE user user VARCHAR(50) DEFAULT \'NULL\', CHANGE vehicle vehicle VARCHAR(50) DEFAULT \'NULL\', CHANGE content content VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE garage CHANGE name name VARCHAR(255) DEFAULT \'NULL\', CHANGE address address VARCHAR(100) DEFAULT \'NULL\', CHANGE phone_number phone_number VARCHAR(100) DEFAULT \'NULL\', CHANGE email email VARCHAR(100) DEFAULT \'NULL\', CHANGE website website VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE opening_hours CHANGE garage garage VARCHAR(255) DEFAULT \'NULL\', CHANGE day_of_week day_of_week VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE `order` CHANGE user user VARCHAR(50) DEFAULT \'NULL\', CHANGE vehicle vehicle VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE password password VARCHAR(30) DEFAULT \'NULL\', CHANGE username username VARCHAR(50) DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\', CHANGE tel tel VARCHAR(50) DEFAULT \'NULL\', CHANGE employee employee VARCHAR(50) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE vehicle CHANGE modelvehicle modelvehicle VARCHAR(50) DEFAULT \'NULL\', CHANGE description description VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE vehicle_image CHANGE vehicle vehicle VARCHAR(100) DEFAULT \'NULL\', CHANGE filename filename VARCHAR(255) DEFAULT \'NULL\', CHANGE path path VARCHAR(255) DEFAULT \'NULL\'');
    }
}
