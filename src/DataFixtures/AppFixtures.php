<?php

namespace App\DataFixtures;

use App\Factory\AnimationFactory;
use App\Factory\CarteFactory;
use App\Factory\CruFactory;
use App\Factory\PartenaireFactory;
use App\Factory\ProduitFactory;
use App\Factory\VigneronFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            [AnimationFixtures::class],
            [CarteFixtures::class],
            [CompteFixtures::class],
            [CruFixtures::class],
            [PartenaireFixtures::class],
            [ProduitFixtures::class],
            [VigneronFixtures::class],
        ];
    }
}
