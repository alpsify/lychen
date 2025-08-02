<?php

namespace App\Factory;

use App\Entity\ConsumptionMethod;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<ConsumptionMethod>
 */
final class ConsumptionMethodFactory extends PersistentProxyObjectFactory
{

    public function __construct()
    {
    }

    public static function class(): string
    {
        return ConsumptionMethod::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'code' => self::faker()->text(100),
        ];
    }

    protected function initialize(): static
    {
        return $this// ->afterInstantiate(function(ConsumptionMethod $exposure): void {})
            ;
    }
}
