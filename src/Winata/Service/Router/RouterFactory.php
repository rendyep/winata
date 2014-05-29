<?php

namespace Winata\Service\Router;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;

class RouterFactory implements ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new Router($serviceManager);

        return $service;
    }
}
