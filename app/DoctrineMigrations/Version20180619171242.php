<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180619171242 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gestiona DROP FOREIGN KEY FK_23080F9A10560508');
        $this->addSql('ALTER TABLE gestiona DROP FOREIGN KEY FK_23080F9A7EB2C349');
        $this->addSql('DROP INDEX IDX_23080F9A7EB2C349 ON gestiona');
        $this->addSql('DROP INDEX IDX_23080F9A10560508 ON gestiona');
        $this->addSql('ALTER TABLE gestiona DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE gestiona ADD usuario_id INT NOT NULL, ADD categoria_id INT NOT NULL, DROP id_usuario_id, DROP id_categoria_id');
        $this->addSql('ALTER TABLE gestiona ADD CONSTRAINT FK_23080F9ADB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE gestiona ADD CONSTRAINT FK_23080F9A3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_23080F9ADB38439E ON gestiona (usuario_id)');
        $this->addSql('CREATE INDEX IDX_23080F9A3397707A ON gestiona (categoria_id)');
        $this->addSql('ALTER TABLE gestiona ADD PRIMARY KEY (usuario_id, categoria_id)');
        $this->addSql('ALTER TABLE administrar DROP FOREIGN KEY FK_7B9CB34B717D320B');
        $this->addSql('ALTER TABLE administrar DROP FOREIGN KEY FK_7B9CB34B7EB2C349');
        $this->addSql('DROP INDEX IDX_7B9CB34B7EB2C349 ON administrar');
        $this->addSql('DROP INDEX IDX_7B9CB34B717D320B ON administrar');
        $this->addSql('ALTER TABLE administrar DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE administrar ADD usuario_id INT NOT NULL, ADD enlace_id INT NOT NULL, DROP id_usuario_id, DROP id_enlace_id');
        $this->addSql('ALTER TABLE administrar ADD CONSTRAINT FK_7B9CB34BDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE administrar ADD CONSTRAINT FK_7B9CB34BF1488E2C FOREIGN KEY (enlace_id) REFERENCES enlace (id)');
        $this->addSql('CREATE INDEX IDX_7B9CB34BDB38439E ON administrar (usuario_id)');
        $this->addSql('CREATE INDEX IDX_7B9CB34BF1488E2C ON administrar (enlace_id)');
        $this->addSql('ALTER TABLE administrar ADD PRIMARY KEY (usuario_id, enlace_id)');
        $this->addSql('ALTER TABLE enlace DROP FOREIGN KEY FK_8414B279ECCEF2A9');
        $this->addSql('DROP INDEX IDX_8414B279ECCEF2A9 ON enlace');
        $this->addSql('ALTER TABLE enlace CHANGE categoria_enlace_id categoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enlace ADD CONSTRAINT FK_8414B2793397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_8414B2793397707A ON enlace (categoria_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE administrar DROP FOREIGN KEY FK_7B9CB34BDB38439E');
        $this->addSql('ALTER TABLE administrar DROP FOREIGN KEY FK_7B9CB34BF1488E2C');
        $this->addSql('DROP INDEX IDX_7B9CB34BDB38439E ON administrar');
        $this->addSql('DROP INDEX IDX_7B9CB34BF1488E2C ON administrar');
        $this->addSql('ALTER TABLE administrar DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE administrar ADD id_usuario_id INT NOT NULL, ADD id_enlace_id INT NOT NULL, DROP usuario_id, DROP enlace_id');
        $this->addSql('ALTER TABLE administrar ADD CONSTRAINT FK_7B9CB34B717D320B FOREIGN KEY (id_enlace_id) REFERENCES enlace (id)');
        $this->addSql('ALTER TABLE administrar ADD CONSTRAINT FK_7B9CB34B7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_7B9CB34B7EB2C349 ON administrar (id_usuario_id)');
        $this->addSql('CREATE INDEX IDX_7B9CB34B717D320B ON administrar (id_enlace_id)');
        $this->addSql('ALTER TABLE administrar ADD PRIMARY KEY (id_usuario_id, id_enlace_id)');
        $this->addSql('ALTER TABLE enlace DROP FOREIGN KEY FK_8414B2793397707A');
        $this->addSql('DROP INDEX IDX_8414B2793397707A ON enlace');
        $this->addSql('ALTER TABLE enlace CHANGE categoria_id categoria_enlace_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE enlace ADD CONSTRAINT FK_8414B279ECCEF2A9 FOREIGN KEY (categoria_enlace_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_8414B279ECCEF2A9 ON enlace (categoria_enlace_id)');
        $this->addSql('ALTER TABLE gestiona DROP FOREIGN KEY FK_23080F9ADB38439E');
        $this->addSql('ALTER TABLE gestiona DROP FOREIGN KEY FK_23080F9A3397707A');
        $this->addSql('DROP INDEX IDX_23080F9ADB38439E ON gestiona');
        $this->addSql('DROP INDEX IDX_23080F9A3397707A ON gestiona');
        $this->addSql('ALTER TABLE gestiona DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE gestiona ADD id_usuario_id INT NOT NULL, ADD id_categoria_id INT NOT NULL, DROP usuario_id, DROP categoria_id');
        $this->addSql('ALTER TABLE gestiona ADD CONSTRAINT FK_23080F9A10560508 FOREIGN KEY (id_categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE gestiona ADD CONSTRAINT FK_23080F9A7EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_23080F9A7EB2C349 ON gestiona (id_usuario_id)');
        $this->addSql('CREATE INDEX IDX_23080F9A10560508 ON gestiona (id_categoria_id)');
        $this->addSql('ALTER TABLE gestiona ADD PRIMARY KEY (id_usuario_id, id_categoria_id)');
    }
}
