<?php


namespace App\Tests\Controller\Carte;

use App\Factory\CarteFactory;
use App\Tests\ControllerTester;

class SearchCest
{
    public function search(ControllerTester $I)
    {
        /*
         * Création de 5 cartes dont :
         * - 3 contiennent un a
         * - 3 contiennent un b
         * - 2 contiennent un c
         * - Aucune ne contient de o
         */
        CarteFactory::createOne(['nom' => 'aaaaaaa']);
        CarteFactory::createOne(['nom' => 'bbbbbbb']);
        CarteFactory::createOne(['nom' => 'ccccccc']);
        CarteFactory::createOne(['nom' => 'aaabbbb']);
        CarteFactory::createOne(['nom' => 'cccbbba']);
        $I->amOnPage('/carte');
        $I->seeNumberOfElements('.carte', 2);
        $I->amOnPage('/carte?search=b');
        $I->seeNumberOfElements('.carte', 3);
        $I->amOnPage('/carte?search=a');
        $I->seeNumberOfElements('.carte', 3);
        $I->amOnPage('/carte?search=o');
        $I->seeNumberOfElements('.carte', 0);
    }
}
