<?php


namespace App\Tests\Controller\Carte;

use App\Factory\CarteFactory;
use App\Tests\ControllerTester;

class ShowCest
{
    public function showCarte(ControllerTester $I)
    {
        $I->amOnPage('/carte');
        $I->click('Aaaaaaaaaaaa');
        $I->seeCurrentRouteIs('app_carte_show');
        $I->seeResponseCodeIsSuccessful();
        $I->seeNumberOfElements('img', 1);
        $I->seeNumberOfElements('.carte', 1);
    }
}
