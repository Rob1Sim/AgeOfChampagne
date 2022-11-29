<?php

namespace App\DataFixtures;

use App\Factory\CarteFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use function Zenstruck\Foundry\faker;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CarteFactory::createMany(10);
        $manager->flush();

    }
}
