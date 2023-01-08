<?php

namespace App\DataFixtures;

use App\Entity\Animation;
use App\Entity\Partenaire;
use App\Factory\AnimationFactory;
use App\Factory\CruFactory;
use App\Factory\PartenaireFactory;
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
        $vignerons = VigneronFactory::createMany(10, function () {
            return [
                'cru' => CruFactory::random(),
                'produit' => ProduitFactory::random(),
            ];
        });
        foreach ($vignerons as $relations) {
            return [
                $relations->addAnimation($animation),
                $relations->addPartenaire($partenaire),
            ];
        }
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
