<?php

namespace App\DataFixtures;

use App\Factory\PartenaireFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PartenaireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PartenaireFactory::createMany(10);

        $manager->flush();
    }
}
