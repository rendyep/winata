<?php

namespace Winata\Service\Session;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;

class SessionContainerFactory implements ServiceProviderFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new SessionContainer($serviceManager);

        return $service->getSessionStorage();
    }
}
