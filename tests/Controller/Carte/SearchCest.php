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
         * - 3 contiennent un xxxxx
         * - 3 contiennent un yyyyy
         * - 2 contiennent un zzzzz
         * - Aucune ne contient de ooooo
         */
        CarteFactory::createOne(['nom' => 'xxxxx']);
        CarteFactory::createOne(['nom' => 'yyyyy']);
        CarteFactory::createOne(['nom' => 'zzzzz']);
        CarteFactory::createOne(['nom' => 'xxxxxyyyyy']);
        CarteFactory::createOne(['nom' => 'xxxxxyyyyyzzzzz']);
        $I->amOnPage('/carte?search=zzzzz');
        $I->seeNumberOfElements('.carte', 2);
        $I->amOnPage('/carte?search=yyyyy');
        $I->seeNumberOfElements('.carte', 3);
        $I->amOnPage('/carte?search=xxxxx');
        $I->seeNumberOfElements('.carte', 3);
        $I->amOnPage('/carte?search=ooooo');
        $I->seeNumberOfElements('.carte', 0);
    }
}
