<?php

namespace App\Tests\Controller\SecurityController;

use App\Tests\ControllerTester;

class loginCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
        $I->amOnPage('/login');
        $I->seeResponseCodeIsSuccessful();
        $I->fillField('Adresse Mail', 'root@example.fr');
        $I->fillField('Mot de passe', 'test');
        $I->click('Connexion');
        $I->seeCurrentUrlEquals('/admin');
    }
}
