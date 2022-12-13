<?php

namespace App\DataFixtures;

use App\Factory\AnimationFactory;
use App\Factory\CruFactory;
use App\Factory\PartenaireFactory;
use App\Factory\ProduitFactory;
use App\Factory\VigneronFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VigneronFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        VigneronFactory::createMany(10, function () {
            return [
                'cru' => CruFactory::createMany(10),
                'produit' => ProduitFactory::createMany(10),
                'animation' => AnimationFactory::createMany(10),
                'partenaire' => PartenaireFactory::createMany(10),
            ];
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            [ProduitFixtures::class],
            [CruFixtures::class],
            [AnimationFixtures::class],
            [PartenaireFixtures::class],
        ];
    }
}
