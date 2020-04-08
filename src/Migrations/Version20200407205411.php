<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200407205411 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE access_token (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, access_token VARCHAR(255) DEFAULT NULL, token_type VARCHAR(255) DEFAULT NULL, expires_in INT DEFAULT NULL, refresh_token VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B6A2DD689D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_genre (film_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_1A3CCDA8567F5183 (film_id), INDEX IDX_1A3CCDA84296D31F (genre_id), PRIMARY KEY(film_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_stuff (id INT AUTO_INCREMENT NOT NULL, author LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', director LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', producer LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', actor LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, film_id_id INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_472B783AE6286007 (film_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE access_token ADD CONSTRAINT FK_B6A2DD689D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE film_genre ADD CONSTRAINT FK_1A3CCDA8567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_genre ADD CONSTRAINT FK_1A3CCDA84296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783AE6286007 FOREIGN KEY (film_id_id) REFERENCES film (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE film_genre DROP FOREIGN KEY FK_1A3CCDA8567F5183');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783AE6286007');
        $this->addSql('ALTER TABLE film_genre DROP FOREIGN KEY FK_1A3CCDA84296D31F');
        $this->addSql('ALTER TABLE access_token DROP FOREIGN KEY FK_B6A2DD689D86650F');
        $this->addSql('DROP TABLE access_token');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_genre');
        $this->addSql('DROP TABLE film_stuff');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE user');
    }
}
