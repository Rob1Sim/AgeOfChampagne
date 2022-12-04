<?php

namespace App\Tests\Controller\RegistrationController;

use App\Tests\ControllerTester;

class registerCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
        $I->amOnPage('/register');
        $I->seeResponseCodeIsSuccessful();
        $I->fillField('Identifiant', 'davert');
        $I->fillField('Adresse Mail', 'qwerty');
        $I->fillField('Date de naissance', 'davert');
        $I->fillField('password', 'qwerty');
        $I->fillField('Mot de passe', 'davert');
        $I->click("Acceptez les conditions d'utilisations");
        $I->click("S'inscrire");
        $I->seeCurrentUrlEquals('/login');
    }
}
