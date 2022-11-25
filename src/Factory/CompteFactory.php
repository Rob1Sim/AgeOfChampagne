<?php

namespace App\Factory;

use App\Entity\Compte;
use App\Repository\CompteRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Compte>
 *
 * @method static Compte|Proxy createOne(array $attributes = [])
 * @method static Compte[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Compte[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Compte|Proxy find(object|array|mixed $criteria)
 * @method static Compte|Proxy findOrCreate(array $attributes)
 * @method static Compte|Proxy first(string $sortedField = 'id')
 * @method static Compte|Proxy last(string $sortedField = 'id')
 * @method static Compte|Proxy random(array $attributes = [])
 * @method static Compte|Proxy randomOrCreate(array $attributes = [])
 * @method static Compte[]|Proxy[] all()
 * @method static Compte[]|Proxy[] findBy(array $attributes)
 * @method static Compte[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Compte[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CompteRepository|RepositoryProxy repository()
 * @method Compte|Proxy create(array|callable $attributes = [])
 */
final class CompteFactory extends ModelFactory
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
            'email' => self::faker()->text(),
            'roles' => [],
            'password' => self::faker()->text(),
            'dateNaiss' => self::faker()->dateTime(),
            'login' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Compte $compte): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Compte::class;
    }
}
