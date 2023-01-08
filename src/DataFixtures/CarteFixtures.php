<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Factory\CarteFactory;
use App\Factory\CategoryFactory;
use App\Factory\VigneronFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        CarteFactory::createMany(10, function () {
            return ['vignerons' => VigneronFactory::random(), 'category' => CategoryFactory::random()];
        });
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [VigneronFixtures::class, CategoryFixtures::class];
    }
}
