<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213162026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vigneron_cru (vigneron_id INT NOT NULL, cru_id INT NOT NULL, INDEX IDX_E464E0CD6B7EEB04 (vigneron_id), INDEX IDX_E464E0CD79512374 (cru_id), PRIMARY KEY(vigneron_id, cru_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vigneron_produit (vigneron_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_D33817F16B7EEB04 (vigneron_id), INDEX IDX_D33817F1F347EFB (produit_id), PRIMARY KEY(vigneron_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vigneron_animation (vigneron_id INT NOT NULL, animation_id INT NOT NULL, INDEX IDX_705F374C6B7EEB04 (vigneron_id), INDEX IDX_705F374C3858647E (animation_id), PRIMARY KEY(vigneron_id, animation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vigneron_partenaire (vigneron_id INT NOT NULL, partenaire_id INT NOT NULL, INDEX IDX_C20D3D846B7EEB04 (vigneron_id), INDEX IDX_C20D3D8498DE13AC (partenaire_id), PRIMARY KEY(vigneron_id, partenaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vigneron_cru ADD CONSTRAINT FK_E464E0CD6B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_cru ADD CONSTRAINT FK_E464E0CD79512374 FOREIGN KEY (cru_id) REFERENCES cru (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_produit ADD CONSTRAINT FK_D33817F16B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_produit ADD CONSTRAINT FK_D33817F1F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_animation ADD CONSTRAINT FK_705F374C6B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_animation ADD CONSTRAINT FK_705F374C3858647E FOREIGN KEY (animation_id) REFERENCES animation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_partenaire ADD CONSTRAINT FK_C20D3D846B7EEB04 FOREIGN KEY (vigneron_id) REFERENCES vigneron (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vigneron_partenaire ADD CONSTRAINT FK_C20D3D8498DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animation DROP FOREIGN KEY FK_8D5284DC39FAAA15');
        $this->addSql('DROP INDEX IDX_8D5284DC39FAAA15 ON animation');
        $this->addSql('ALTER TABLE animation DROP vignerons_anim_id');
        $this->addSql('ALTER TABLE cru DROP FOREIGN KEY FK_88B632ACD4264838');
        $this->addSql('DROP INDEX IDX_88B632ACD4264838 ON cru');
        $this->addSql('ALTER TABLE cru DROP vignerons_cru_id');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA3733324313C');
        $this->addSql('DROP INDEX IDX_32FFA3733324313C ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP vignerons_part_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC277E0F45A5');
        $this->addSql('DROP INDEX IDX_29A5EC277E0F45A5 ON produit');
        $this->addSql('ALTER TABLE produit DROP vignerons_prod_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vigneron_cru DROP FOREIGN KEY FK_E464E0CD6B7EEB04');
        $this->addSql('ALTER TABLE vigneron_cru DROP FOREIGN KEY FK_E464E0CD79512374');
        $this->addSql('ALTER TABLE vigneron_produit DROP FOREIGN KEY FK_D33817F16B7EEB04');
        $this->addSql('ALTER TABLE vigneron_produit DROP FOREIGN KEY FK_D33817F1F347EFB');
        $this->addSql('ALTER TABLE vigneron_animation DROP FOREIGN KEY FK_705F374C6B7EEB04');
        $this->addSql('ALTER TABLE vigneron_animation DROP FOREIGN KEY FK_705F374C3858647E');
        $this->addSql('ALTER TABLE vigneron_partenaire DROP FOREIGN KEY FK_C20D3D846B7EEB04');
        $this->addSql('ALTER TABLE vigneron_partenaire DROP FOREIGN KEY FK_C20D3D8498DE13AC');
        $this->addSql('DROP TABLE vigneron_cru');
        $this->addSql('DROP TABLE vigneron_produit');
        $this->addSql('DROP TABLE vigneron_animation');
        $this->addSql('DROP TABLE vigneron_partenaire');
        $this->addSql('ALTER TABLE cru ADD vignerons_cru_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cru ADD CONSTRAINT FK_88B632ACD4264838 FOREIGN KEY (vignerons_cru_id) REFERENCES vigneron (id)');
        $this->addSql('CREATE INDEX IDX_88B632ACD4264838 ON cru (vignerons_cru_id)');
        $this->addSql('ALTER TABLE produit ADD vignerons_prod_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC277E0F45A5 FOREIGN KEY (vignerons_prod_id) REFERENCES vigneron (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC277E0F45A5 ON produit (vignerons_prod_id)');
        $this->addSql('ALTER TABLE animation ADD vignerons_anim_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animation ADD CONSTRAINT FK_8D5284DC39FAAA15 FOREIGN KEY (vignerons_anim_id) REFERENCES vigneron (id)');
        $this->addSql('CREATE INDEX IDX_8D5284DC39FAAA15 ON animation (vignerons_anim_id)');
        $this->addSql('ALTER TABLE partenaire ADD vignerons_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA3733324313C FOREIGN KEY (vignerons_part_id) REFERENCES vigneron (id)');
        $this->addSql('CREATE INDEX IDX_32FFA3733324313C ON partenaire (vignerons_part_id)');
    }
}
