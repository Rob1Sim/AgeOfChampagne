<?php

namespace App\DataFixtures;

use App\Entity\Animation;
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
                'vigneronsAnim' => AnimationFactory::random(),
                'vigneronsCru' => CruFactory::random(),
                'vigneronsPart' => PartenaireFactory::random(),
                'vigneronsProd' => ProduitFactory::random(),
            ];
        });

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            [AnimationFixtures::class],
            [CruFixtures::class],
            [PartenaireFixtures::class],
            [ProduitFixtures::class],
        ];
    }

}
