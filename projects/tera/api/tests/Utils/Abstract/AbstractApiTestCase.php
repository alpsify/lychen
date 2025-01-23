<?php

namespace App\Tests\Utils\Abstract;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use DAMA\DoctrineTestBundle\Doctrine\DBAL\StaticDriver;
use JetBrains\PhpStorm\NoReturn;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;
use Zenstruck\Messenger\Test\InteractsWithMessenger;

class AbstractApiTestCase extends ApiTestCase
{
    use ResetDatabase;
    use Factories;
    use InteractsWithMessenger;

    #[NoReturn] protected function commitAndDie(): void
    {
        StaticDriver::commit();
        exit;
    }
}
