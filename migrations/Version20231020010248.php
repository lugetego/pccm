<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020010248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE curso (id INT AUTO_INCREMENT NOT NULL, semestre_id INT NOT NULL, slug VARCHAR(100) NOT NULL, apellidos VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, curso VARCHAR(255) NOT NULL, tema VARCHAR(255) DEFAULT NULL, objetivo LONGTEXT DEFAULT NULL, temario LONGTEXT DEFAULT NULL, bibliografia LONGTEXT DEFAULT NULL, requisitos LONGTEXT DEFAULT NULL, comentarios LONGTEXT DEFAULT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_CA3B40EC989D9B62 (slug), INDEX IDX_CA3B40EC5577AFDB (semestre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semestre (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(100) NOT NULL, semestre VARCHAR(255) NOT NULL, vigencia DATE NOT NULL, convocatoria_name VARCHAR(255) DEFAULT NULL, calendario_name VARCHAR(255) DEFAULT NULL, rcalendario_name VARCHAR(255) DEFAULT NULL, instructivo_name VARCHAR(255) DEFAULT NULL, reconvocatoriam_name VARCHAR(255) DEFAULT NULL, reconvocatoriad_name VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_71688FBC989D9B62 (slug), UNIQUE INDEX UNIQ_71688FBC71688FBC (semestre), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tutor (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(100) NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, adscripcion VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, area VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, created DATETIME DEFAULT NULL, modified DATETIME DEFAULT NULL, titulo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_99074648989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE curso ADD CONSTRAINT FK_CA3B40EC5577AFDB FOREIGN KEY (semestre_id) REFERENCES semestre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE curso DROP FOREIGN KEY FK_CA3B40EC5577AFDB');
        $this->addSql('DROP TABLE curso');
        $this->addSql('DROP TABLE semestre');
        $this->addSql('DROP TABLE tutor');
        $this->addSql('DROP TABLE user');
    }
}
