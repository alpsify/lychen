<?php

namespace App\Factory;

use App\Entity\LunarType;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<LunarType>
 */
final class LunarTypeFactory extends PersistentProxyObjectFactory
{

    public function __construct()
    {
    }

    public static function class(): string
    {
        return LunarType::class;
    }


    protected function defaults(): array|callable
    {
        return [
            'code' => self::faker()->text(100),
        ];
    }


    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(LunarType $lunarType): void {})
        ;
    }
}
