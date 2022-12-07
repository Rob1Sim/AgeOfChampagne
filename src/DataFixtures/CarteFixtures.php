<?php

namespace App\DataFixtures;

use App\Factory\CarteFactory;
use App\Factory\VigneronFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        CarteFactory::createMany(10,function (){
            return ["vignerons"=>VigneronFactory::random()];
        });
        $manager->flush();
    }
    public function getDependencies()
    {
        return[VigneronFixtures::class];
    }
}
