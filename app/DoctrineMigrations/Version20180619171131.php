<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180619171131 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, grupo_id INT DEFAULT NULL, nombre_categoria VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, aprobada TINYINT(1) NOT NULL, fecha_aceptacion DATE DEFAULT NULL, UNIQUE INDEX UNIQ_4E10122D9C833003 (grupo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, nombre_usuario VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, correo_electronico VARCHAR(255) NOT NULL, tipo_usuario VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_grupos (usuario_id INT NOT NULL, grupos_id INT NOT NULL, INDEX IDX_FE4AA1F7DB38439E (usuario_id), INDEX IDX_FE4AA1F77EE46FAF (grupos_id), PRIMARY KEY(usuario_id, grupos_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enlace (id INT AUTO_INCREMENT NOT NULL, autor_id INT NOT NULL, categoria_enlace_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, INDEX IDX_8414B27914D45BBE (autor_id), INDEX IDX_8414B279ECCEF2A9 (categoria_enlace_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grupos (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, nombre_admin VARCHAR(255) NOT NULL, fecha_creacion DATE NOT NULL, descripcion LONGTEXT NOT NULL, total_miembros INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestiona (id_usuario_id INT NOT NULL, id_categoria_id INT NOT NULL, numero_cambios INT NOT NULL, ultima_modificacion DATE NOT NULL, observaciones LONGTEXT NOT NULL, INDEX IDX_23080F9A7EB2C349 (id_usuario_id), INDEX IDX_23080F9A10560508 (id_categoria_id), PRIMARY KEY(id_usuario_id, id_categoria_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrar (id_usuario_id INT NOT NULL, id_enlace_id INT NOT NULL, fecha_subida DATE NOT NULL, fecha_aceptacion DATE DEFAULT NULL, fecha_rechazo DATE DEFAULT NULL, observaciones LONGTEXT NOT NULL, INDEX IDX_7B9CB34B7EB2C349 (id_usuario_id), INDEX IDX_7B9CB34B717D320B (id_enlace_id), PRIMARY KEY(id_usuario_id, id_enlace_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoria ADD CONSTRAINT FK_4E10122D9C833003 FOREIGN KEY (grupo_id) REFERENCES grupos (id)');
        $this->addSql('ALTER TABLE usuario_grupos ADD CONSTRAINT FK_FE4AA1F7DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_grupos ADD CONSTRAINT FK_FE4AA1F77EE46FAF FOREIGN KEY (grupos_id) REFERENCES grupos (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enlace ADD CONSTRAINT FK_8414B27914D45BBE FOREIGN KEY (autor_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE enlace ADD CONSTRAINT FK_8414B279ECCEF2A9 FOREIGN KEY (categoria_enlace_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE gestiona ADD CONSTRAINT FK_23080F9A7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE gestiona ADD CONSTRAINT FK_23080F9A10560508 FOREIGN KEY (id_categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE administrar ADD CONSTRAINT FK_7B9CB34B7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE administrar ADD CONSTRAINT FK_7B9CB34B717D320B FOREIGN KEY (id_enlace_id) REFERENCES enlace (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE enlace DROP FOREIGN KEY FK_8414B279ECCEF2A9');
        $this->addSql('ALTER TABLE gestiona DROP FOREIGN KEY FK_23080F9A10560508');
        $this->addSql('ALTER TABLE usuario_grupos DROP FOREIGN KEY FK_FE4AA1F7DB38439E');
        $this->addSql('ALTER TABLE enlace DROP FOREIGN KEY FK_8414B27914D45BBE');
        $this->addSql('ALTER TABLE gestiona DROP FOREIGN KEY FK_23080F9A7EB2C349');
        $this->addSql('ALTER TABLE administrar DROP FOREIGN KEY FK_7B9CB34B7EB2C349');
        $this->addSql('ALTER TABLE administrar DROP FOREIGN KEY FK_7B9CB34B717D320B');
        $this->addSql('ALTER TABLE categoria DROP FOREIGN KEY FK_4E10122D9C833003');
        $this->addSql('ALTER TABLE usuario_grupos DROP FOREIGN KEY FK_FE4AA1F77EE46FAF');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_grupos');
        $this->addSql('DROP TABLE enlace');
        $this->addSql('DROP TABLE grupos');
        $this->addSql('DROP TABLE gestiona');
        $this->addSql('DROP TABLE administrar');
    }
}
