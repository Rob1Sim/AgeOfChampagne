<?php

namespace App\Factory;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Produit>
 *
 * @method static Produit|Proxy                     createOne(array $attributes = [])
 * @method static Produit[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Produit[]|Proxy[]                 createSequence(array|callable $sequence)
 * @method static Produit|Proxy                     find(object|array|mixed $criteria)
 * @method static Produit|Proxy                     findOrCreate(array $attributes)
 * @method static Produit|Proxy                     first(string $sortedField = 'id')
 * @method static Produit|Proxy                     last(string $sortedField = 'id')
 * @method static Produit|Proxy                     random(array $attributes = [])
 * @method static Produit|Proxy                     randomOrCreate(array $attributes = [])
 * @method static Produit[]|Proxy[]                 all()
 * @method static Produit[]|Proxy[]                 findBy(array $attributes)
 * @method static Produit[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 * @method static Produit[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ProduitRepository|RepositoryProxy repository()
 * @method        Produit|Proxy                     create(array|callable $attributes = [])
 */
final class ProduitFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'libelle' => self::faker()->company(),
            'prix' => self::faker()->randomFloat(2, 50, 5000),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Produit $produit): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Produit::class;
    }
}
