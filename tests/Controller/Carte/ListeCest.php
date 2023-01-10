<?php


namespace App\Tests\Controller\Carte;

use App\Entity\Carte;
use App\Factory\CarteFactory;
use App\Factory\CategoryFactory;
use App\Tests\ControllerTester;

class ListeCest
{
    public function listeCartes(ControllerTester $I)
    {
        CarteFactory::createMany(10, ['category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'Aaaaaaaaaaaa', 'category' => CategoryFactory::createOne()]);
        $I->amOnPage('/carte');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des cartes');
        $I->seeNumberOfElements('.carte', 11);
        $I->seeCurrentRouteIs('app_carte');
    }

    public function redirectToCarte(ControllerTester $I)
    {
        CarteFactory::createMany(5, ['category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'Aaaaaaaaaaaa', 'category' => CategoryFactory::createOne()]);
        $I->amOnPage('/carte');
        $I->seeResponseCodeIsSuccessful();
        $I->click('Aaaaaaaaaaaa');
        $I->seeCurrentRouteIs('app_carte_show');
    }
}
