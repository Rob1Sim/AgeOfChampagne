<?php

namespace App\Factory;

use App\Entity\Carte;
use App\Repository\CarteRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Carte>
 *
 * @method static Carte|Proxy createOne(array $attributes = [])
 * @method static Carte[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Carte[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Carte|Proxy find(object|array|mixed $criteria)
 * @method static Carte|Proxy findOrCreate(array $attributes)
 * @method static Carte|Proxy first(string $sortedField = 'id')
 * @method static Carte|Proxy last(string $sortedField = 'id')
 * @method static Carte|Proxy random(array $attributes = [])
 * @method static Carte|Proxy randomOrCreate(array $attributes = [])
 * @method static Carte[]|Proxy[] all()
 * @method static Carte[]|Proxy[] findBy(array $attributes)
 * @method static Carte[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Carte[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CarteRepository|RepositoryProxy repository()
 * @method Carte|Proxy create(array|callable $attributes = [])
 */
final class CarteFactory extends ModelFactory
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
            'nom' => self::faker()->text(),
            'type' => self::faker()->text(),
            'cru' => self::faker()->text(),
            'region' => self::faker()->text(),
            'latitude' => self::faker()->randomFloat(),
            'longitude' => self::faker()->randomFloat(),
            'superficie' => self::faker()->randomFloat(),
            'contenuImage' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Carte $carte): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Carte::class;
    }
}
