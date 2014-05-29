<?php

namespace Winata\Service\View;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;

class ViewFactory implements ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new View($serviceManager);

        return $service;
    }
}
