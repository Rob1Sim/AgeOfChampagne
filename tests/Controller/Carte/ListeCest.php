<?php


namespace App\Tests\Controller\Carte;

use App\Factory\CarteFactory;
use App\Tests\ControllerTester;

class ListeCest
{
    public function listeCartes(ControllerTester $I)
    {
        CarteFactory::createMany(10);
        CarteFactory::createOne(['nom' => 'Aaaaaaaaaaaa']);
        $I->amOnPage();
    }
}
