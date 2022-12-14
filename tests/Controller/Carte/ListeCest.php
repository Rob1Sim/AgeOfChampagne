<?php


namespace App\Tests\Controller\Carte;

use App\Entity\Carte;
use App\Factory\CarteFactory;
use App\Tests\ControllerTester;

class ListeCest
{
    public function listeCartes(ControllerTester $I)
    {
        CarteFactory::createMany(10);
        CarteFactory::createOne(['nom' => 'Aaaaaaaaaaaa']);
        $I->amOnPage('/carte');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des cartes');
        $I->seeNumberOfElements('.carte', 11);
        $I->seeCurrentRouteIs('app_carte');
    }

    public function redirectToCarte(ControllerTester $I)
    {
        CarteFactory::createMany(5);
        CarteFactory::createOne(['nom' => 'Aaaaaaaaaaaa']);
        $I->amOnPage('/carte');
        $I->seeResponseCodeIsSuccessful();
        $I->click('Aaaaaaaaaaaa');
        $I->seeCurrentRouteIs('app_carte_show');
    }
}