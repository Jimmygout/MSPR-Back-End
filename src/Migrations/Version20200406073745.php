<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406073745 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE buvette (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, visible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map_buvette (map_id INT NOT NULL, buvette_id INT NOT NULL, INDEX IDX_AA981D6B53C55F64 (map_id), INDEX IDX_AA981D6B3604D33F (buvette_id), PRIMARY KEY(map_id, buvette_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE map_buvette ADD CONSTRAINT FK_AA981D6B53C55F64 FOREIGN KEY (map_id) REFERENCES map (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE map_buvette ADD CONSTRAINT FK_AA981D6B3604D33F FOREIGN KEY (buvette_id) REFERENCES buvette (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE map_buvette DROP FOREIGN KEY FK_AA981D6B3604D33F');
        $this->addSql('ALTER TABLE map_buvette DROP FOREIGN KEY FK_AA981D6B53C55F64');
        $this->addSql('DROP TABLE buvette');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE map_buvette');
    }
}
