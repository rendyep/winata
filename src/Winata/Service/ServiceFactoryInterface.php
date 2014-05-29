<?php

namespace Winata\Service;

use Winata\ServiceManager\ServiceManagerInterface;

interface ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager);
}
