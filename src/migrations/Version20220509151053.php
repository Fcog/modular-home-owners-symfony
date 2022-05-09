<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220509151053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home ADD home_style_id INT NOT NULL, ADD partner_id INT NOT NULL');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD0DFC89979 FOREIGN KEY (home_style_id) REFERENCES home_style (id)');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD09393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('CREATE INDEX IDX_71D60CD0DFC89979 ON home (home_style_id)');
        $this->addSql('CREATE INDEX IDX_71D60CD09393F8FE ON home (partner_id)');
        $this->addSql('ALTER TABLE partner ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE partner ADD CONSTRAINT FK_312B3E16C54C8C93 FOREIGN KEY (type_id) REFERENCES partner_type (id)');
        $this->addSql('CREATE INDEX IDX_312B3E16C54C8C93 ON partner (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD0DFC89979');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD09393F8FE');
        $this->addSql('DROP INDEX IDX_71D60CD0DFC89979 ON home');
        $this->addSql('DROP INDEX IDX_71D60CD09393F8FE ON home');
        $this->addSql('ALTER TABLE home DROP home_style_id, DROP partner_id');
        $this->addSql('ALTER TABLE partner DROP FOREIGN KEY FK_312B3E16C54C8C93');
        $this->addSql('DROP INDEX IDX_312B3E16C54C8C93 ON partner');
        $this->addSql('ALTER TABLE partner DROP type_id');
    }
}
