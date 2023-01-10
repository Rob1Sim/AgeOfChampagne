<?php


namespace App\Tests\Controller\Carte;

use App\Factory\CarteFactory;
use App\Factory\CategoryFactory;
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
        CarteFactory::createOne(['nom' => 'xxxxx', 'category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'yyyyy', 'category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'zzzzz', 'category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'xxxxxyyyyy', 'category' => CategoryFactory::createOne()]);
        CarteFactory::createOne(['nom' => 'xxxxxyyyyyzzzzz', 'category' => CategoryFactory::createOne()]);
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
