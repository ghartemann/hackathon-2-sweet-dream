<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629151025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE interest_user');
        $this->addSql('DROP TABLE project_user');
        $this->addSql('ALTER TABLE interest DROP INDEX UNIQ_6C3E1A67166D1F9C, ADD INDEX IDX_6C3E1A67166D1F9C (project_id)');
        $this->addSql('ALTER TABLE interest ADD user_id INT DEFAULT NULL, ADD like_status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE interest ADD CONSTRAINT FK_6C3E1A67A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6C3E1A67A76ED395 ON interest (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE interest_user (interest_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_23BD56C55A95FF89 (interest_id), INDEX IDX_23BD56C5A76ED395 (user_id), PRIMARY KEY(interest_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE project_user (project_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B4021E51166D1F9C (project_id), INDEX IDX_B4021E51A76ED395 (user_id), PRIMARY KEY(project_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE interest_user ADD CONSTRAINT FK_23BD56C55A95FF89 FOREIGN KEY (interest_id) REFERENCES interest (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE interest_user ADD CONSTRAINT FK_23BD56C5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_user ADD CONSTRAINT FK_B4021E51166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_user ADD CONSTRAINT FK_B4021E51A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE interest DROP INDEX IDX_6C3E1A67166D1F9C, ADD UNIQUE INDEX UNIQ_6C3E1A67166D1F9C (project_id)');
        $this->addSql('ALTER TABLE interest DROP FOREIGN KEY FK_6C3E1A67A76ED395');
        $this->addSql('DROP INDEX IDX_6C3E1A67A76ED395 ON interest');
        $this->addSql('ALTER TABLE interest DROP user_id, DROP like_status');
    }
}
