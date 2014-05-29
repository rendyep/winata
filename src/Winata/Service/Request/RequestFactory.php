<?php

namespace Winata\Service\Request;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;

class RequestFactory implements ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new Request($serviceManager);

        return $service;
    }
}
