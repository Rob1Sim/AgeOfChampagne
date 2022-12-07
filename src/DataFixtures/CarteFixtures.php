<?php

namespace App\DataFixtures;

use App\Factory\CarteFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carte = json_decode(file_get_contents(__DIR__.'/data/cartes.json'), associative: true);
        for ($i = 0; $i < count($carte); ++$i) {
            CarteFactory::createOne($carte[$i]);
        }
        $manager->flush();
    }
}
