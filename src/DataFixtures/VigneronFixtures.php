<?php

namespace App\DataFixtures;

use App\Factory\VigneronFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VigneronFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        VigneronFactory::createMany(10);
        //TODO: Demander a gillard pourquoi ça ne fonctionne pas
        $manager->flush();
    }
}
