<?php

namespace App\Factory;

use App\Entity\LandTask;
use Lychen\UtilTiptap\Service\TipTapFaker;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<LandTask>
 */
final class LandTaskFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return LandTask::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        $startDate = self::faker()->boolean() ? self::faker()->dateTimeBetween('-1 years', 'now') : null;
        return [
            'title' => self::faker()->text(100),
            'content' => TipTapFaker::randomContent(),
            'dueDate' => self::faker()->boolean() ? self::faker()->dateTimeBetween($startDate, '+1 year') : null,
            'startDate' => $startDate
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(LandTask $landTask): void {})
            ;
    }
}
