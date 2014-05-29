<?php

namespace Winata\Service\Response;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;

class ResponseFactory implements ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new Response($serviceManager);

        return $service;
    }
}
