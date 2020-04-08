<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200408010341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE film_genre');
        $this->addSql('ALTER TABLE film ADD id_gallery_id INT DEFAULT NULL, ADD id_stuff_id INT DEFAULT NULL, ADD id_genre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22A16D2F58 FOREIGN KEY (id_gallery_id) REFERENCES gallery (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22C5D1FBD5 FOREIGN KEY (id_stuff_id) REFERENCES film_stuff (id)');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22124D3F8A FOREIGN KEY (id_genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8244BE22A16D2F58 ON film (id_gallery_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8244BE22C5D1FBD5 ON film (id_stuff_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8244BE22124D3F8A ON film (id_genre_id)');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783AE6286007');
        $this->addSql('DROP INDEX UNIQ_472B783AE6286007 ON gallery');
        $this->addSql('ALTER TABLE gallery DROP film_id_id');
        $this->addSql('ALTER TABLE genre ADD genra_name VARCHAR(255) DEFAULT NULL, DROP genre');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE film_genre (film_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_1A3CCDA84296D31F (genre_id), INDEX IDX_1A3CCDA8567F5183 (film_id), PRIMARY KEY(film_id, genre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE film_genre ADD CONSTRAINT FK_1A3CCDA8567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_genre ADD CONSTRAINT FK_1A3CCDA84296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22A16D2F58');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22C5D1FBD5');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22124D3F8A');
        $this->addSql('DROP INDEX UNIQ_8244BE22A16D2F58 ON film');
        $this->addSql('DROP INDEX UNIQ_8244BE22C5D1FBD5 ON film');
        $this->addSql('DROP INDEX UNIQ_8244BE22124D3F8A ON film');
        $this->addSql('ALTER TABLE film DROP id_gallery_id, DROP id_stuff_id, DROP id_genre_id');
        $this->addSql('ALTER TABLE gallery ADD film_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783AE6286007 FOREIGN KEY (film_id_id) REFERENCES film (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_472B783AE6286007 ON gallery (film_id_id)');
        $this->addSql('ALTER TABLE genre ADD genre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP genra_name');
    }
}
