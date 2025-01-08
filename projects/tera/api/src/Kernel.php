<?php

namespace App;

use App\Contract\Factory\Article\ArticleFactoryInterface;
use App\DependencyInjection\CompilerPass\AppCompilerPass;
use App\DynamicData\Handler\DynamicDataHandler;
use App\Lineable\Factory\Line\LineFactoryInterface;
use App\Pdf\Generator\PdfGeneratorInterface;
use App\SignatureRequest\Factory\Signature\SignatureFactoryInterface;
use App\SignatureRequest\Factory\SignatureRequestFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yml');

        if (is_file(\dirname(__DIR__).'/config/services.yml')) {
            $container->import('../config/services.yml');
            $container->import('../config/{services}_'.$this->environment.'.yml');
        } else {
            $container->import('../config/{services}.php');
        }
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import('../config/{routes}/'.$this->environment.'/*.yml');
        $routes->import('../config/{routes}/*.yml');

        if (is_file(\dirname(__DIR__).'/config/routes.yml')) {
            $routes->import('../config/routes.yml');
        } else {
            $routes->import('../config/{routes}.php');
        }
    }

    protected function build(ContainerBuilder $container): void
    {
    }
}
