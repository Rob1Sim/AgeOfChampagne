<?php


namespace App\Tests\Controller\Carte;

use App\Entity\Carte;
use App\Factory\CarteFactory;
use App\Factory\CategoryFactory;
use App\Factory\CompteFactory;
use App\Factory\VigneronFactory;
use App\Tests\ControllerTester;

class ListeCest
{
    public function listeCartes(ControllerTester $I)
    {
        $user = CompteFactory::createOne(['roles' => ['ROLE_ADMIN']]);
        $trueUser = $user->object();
        $I->amLoggedInAs($trueUser);

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
        $user = CompteFactory::createOne(['roles' => ['ROLE_ADMIN']]);
        $trueUser = $user->object();
        $I->amLoggedInAs($trueUser);

        CarteFactory::createMany(5, ['category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'Aaaaaaaaaaaa', 'category' => CategoryFactory::createOne()]);
        $I->amOnPage('/carte');
        $I->seeResponseCodeIsSuccessful();
        $I->click('Aaaaaaaaaaaa');
        $I->seeCurrentRouteIs('app_carte_show');
    }


    // Vérifie que nous sommes bien redirigés sur /login quand nous ne sommes pas connectés !
    public function restricted(ControllerTester $I)
    {
        CarteFactory::createOne();
        $I->amOnPage('/vigneron/1');
        $I->seeCurrentUrlEquals('/login');
    }
}
