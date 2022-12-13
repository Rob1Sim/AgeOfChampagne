<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213164729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vigneron_produit DROP FOREIGN KEY FK_D33817F16B7EEB04');
        $this->addSql('ALTER TABLE vigneron_produit DROP FOREIGN KEY FK_D33817F1F347EFB');
        $this->addSql('ALTER TABLE vigneron_animation DROP FOREIGN KEY FK_705F374C6B7EEB04');
        $this->addSql('ALTER TABLE vigneron_animation DROP FOREIGN KEY FK_705F374C3858647E');
        $this->addSql('ALTER TABLE vigneron_partenaire DROP FOREIGN KEY FK_C20D3D8498DE13AC');
        $this->addSql('ALTER TABLE vigneron_partenaire DROP FOREIGN KEY FK_C20D3D846B7EEB04');
        $this->addSql('ALTER TABLE vigneron_cru DROP FOREIGN KEY FK_E464E0CD6B7EEB04');
        $this->addSql('ALTER TABLE vigneron_cru DROP FOREIGN KEY FK_E464E0CD79512374');
        $this->addSql('DROP TABLE vigneron_produit');
        $this->addSql('DROP TABLE vigneron_animation');
        $this->addSql('DROP TABLE vigneron_partenaire');
        $this->addSql('DROP TABLE vigneron_cru');
        $this->addSql('ALTER TABLE vigneron ADD animation_id INT DEFAULT NULL, ADD cru_id INT DEFAULT NULL, ADD produit_id INT DEFAULT NULL, ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vigneron ADD CONSTRAINT FK_312238BE3858647E FOREIGN KEY (animation_id) REFERENCES animation (id)');
        $this->addSql('ALTER TABLE vigneron ADD CONSTRAINT FK_312238BE79512374 FOREIGN KEY (cru_id) REFERENCES cru (id)');
        $this->addSql('ALTER TABLE vigneron ADD CONSTRAINT FK_312238BEF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vigneron ADD CONSTRAINT FK_312238BE98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_312238BE3858647E ON vigneron (animation_id)');
        $this->addSql('CREATE INDEX IDX_312238BE79512374 ON vigneron (cru_id)');
        $this->addSql('CREATE INDEX IDX_312238BEF347EFB ON vigneron (produit_id)');
        $this->addSql('CREATE INDEX IDX_312238BE98DE13AC ON vigneron (partenaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vigneron_produit (vigneron_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_D33817F1F347EFB (produit_id), INDEX IDX_D33817F16B7EEB04 (vigneron_id), PRIMARY KEY(vigneron_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vigneron_animation (vigneron_id INT NOT NULL, animation_id INT NOT NULL, INDEX IDX_705F374C3858647E (animation_id), INDEX IDX_705F374C6B7EEB04 (vigneron_id), PRIMARY KEY(vigneron_id, animation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vigneron_partenaire (vigneron_id INT NOT NULL, partenaire_id INT NOT NULL, INDEX IDX_C20D3D8498DE13AC (partenaire_id), INDEX IDX_C20D3D846B7EEB04 (vigneron_id), PRIMARY KEY(vigneron_id, partenaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vigneron_cru (vigneron_id INT NOT NULL, cru_id INT NOT NULL, INDEX IDX_E464E0CD79512374 (cru_id), INDEX IDX_E464E0CD6B7EEB04 (vigneron_id), PRIMARY KEY(vigneron_id, cru_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE vigneron_produit ADD CONSTRAINT FK_D33817F16B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_produit ADD CONSTRAINT FK_D33817F1F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_animation ADD CONSTRAINT FK_705F374C6B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_animation ADD CONSTRAINT FK_705F374C3858647E FOREIGN KEY (animation_id) REFERENCES animation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_partenaire ADD CONSTRAINT FK_C20D3D8498DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_partenaire ADD CONSTRAINT FK_C20D3D846B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_cru ADD CONSTRAINT FK_E464E0CD6B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_cru ADD CONSTRAINT FK_E464E0CD79512374 FOREIGN KEY (cru_id) REFERENCES cru (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron DROP FOREIGN KEY FK_312238BE3858647E');
        $this->addSql('ALTER TABLE vigneron DROP FOREIGN KEY FK_312238BE79512374');
        $this->addSql('ALTER TABLE vigneron DROP FOREIGN KEY FK_312238BEF347EFB');
        $this->addSql('ALTER TABLE vigneron DROP FOREIGN KEY FK_312238BE98DE13AC');
        $this->addSql('DROP INDEX IDX_312238BE3858647E ON vigneron');
        $this->addSql('DROP INDEX IDX_312238BE79512374 ON vigneron');
        $this->addSql('DROP INDEX IDX_312238BEF347EFB ON vigneron');
        $this->addSql('DROP INDEX IDX_312238BE98DE13AC ON vigneron');
        $this->addSql('ALTER TABLE vigneron DROP animation_id, DROP cru_id, DROP produit_id, DROP partenaire_id');
    }
}
