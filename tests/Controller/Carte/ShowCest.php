<?php


namespace App\Tests\Controller\Carte;

use App\Factory\CarteFactory;
use App\Tests\ControllerTester;

class ShowCest
{
    public function showCarte(ControllerTester $I)
    {
        CarteFactory::createMany(10);
    }
}
