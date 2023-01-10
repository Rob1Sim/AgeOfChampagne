<?php

namespace App\Tests\Controller;

use App\Factory\CompteFactory;
use App\Factory\VigneronFactory;
use App\Tests\ControllerTester;


class VigneronCest
{
    public function testVigneronList (ControllerTester $V)
    {
        $user = CompteFactory::createOne(['roles' => ['ROLE_ADMIN']]);
        $trueUser = $user->object();
        $V->amLoggedInAs($trueUser);

        $V->amOnPage('/vigneron');
        $V->seeResponseCodeIsSuccessful();
        $V->seeInTitle('Liste des Vignerons');
        $V->see('Liste des Vignerons');
    }
}