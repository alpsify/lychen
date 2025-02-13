<?php

namespace App\Factory;

use App\Entity\PlantCustom;
use DateTimeImmutable;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<PlantCustom>
 */
final class PlantCustomFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return PlantCustom::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'bio' => self::faker()->boolean(),
            'createdAt' => DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'maturity' => self::faker()->text(255),
            'name' => self::faker()->text(255),
            'perpetual' => self::faker()->boolean(),
            'person' => PersonFactory::new(),
            'shared' => self::faker()->boolean(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(PlantCustom $plantCustom): void {})
            ;
    }
}
