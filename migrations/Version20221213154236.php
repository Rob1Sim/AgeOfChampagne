<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213154236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animation ADD vignerons_anim_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animation ADD CONSTRAINT FK_8D5284DC39FAAA15 FOREIGN KEY (vignerons_anim_id) REFERENCES vigneron (id)');
        $this->addSql('CREATE INDEX IDX_8D5284DC39FAAA15 ON animation (vignerons_anim_id)');
        $this->addSql('ALTER TABLE partenaire ADD vignerons_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA3733324313C FOREIGN KEY (vignerons_part_id) REFERENCES vigneron (id)');
        $this->addSql('CREATE INDEX IDX_32FFA3733324313C ON partenaire (vignerons_part_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA3733324313C');
        $this->addSql('DROP INDEX IDX_32FFA3733324313C ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP vignerons_part_id');
        $this->addSql('ALTER TABLE animation DROP FOREIGN KEY FK_8D5284DC39FAAA15');
        $this->addSql('DROP INDEX IDX_8D5284DC39FAAA15 ON animation');
        $this->addSql('ALTER TABLE animation DROP vignerons_anim_id');
    }
}
