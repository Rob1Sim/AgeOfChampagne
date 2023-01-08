<?php

namespace App\Tests\Controller;

use App\Factory\VigneronFactory;
use App\Tests\ControllerTester;


class VigneronCest
{
    public function testVigneronList (ControllerTester $V)
    {
        $V->amOnPage('/vigneron');
        $V->seeResponseCodeIsSuccessful();
        $V->seeInTitle('Liste des Vignerons');
        $V->see('Liste des Vignerons');
    }
}