<?php

namespace App\DataFixtures;

use App\Entity\Animation;
use App\Entity\Partenaire;
use App\Entity\Vigneron;
use App\Factory\CruFactory;
use App\Factory\ProduitFactory;
use App\Factory\VigneronFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VigneronFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): array
    {
        $animation = new Animation();
        $partenaire = new Partenaire();
        $vigneron = new Vigneron();

        $vignerons = VigneronFactory::createMany(10, function () {
            return [
                'cru' => CruFactory::random(),
                'produit' => ProduitFactory::random(),
            ];
        });
        foreach ($vignerons as $relations) {
            return [
                $this->addReference('vigneron_animation', $animation),
                $this->addReference('vigneron_partenaire', $partenaire),

                $relations->addAnimation($animation),
                $animation->addVigneronsAnim($vigneron),

                $relations->addPartenaire($partenaire),
                $partenaire->addVigneronsPart($vigneron),
            ];
        }
        $manager->persist($partenaire);
        $manager->persist($vigneron);
        $manager->persist($animation);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProduitFixtures::class,
            CruFixtures::class,
            AnimationFixtures::class,
            PartenaireFixtures::class,
        ];
    }
}
