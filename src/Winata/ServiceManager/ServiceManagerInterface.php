<?php

namespace Winata\ServiceManager;

use Winata\Service\ServiceInterface;

interface ServiceManagerInterface
{
    public function setService($serviceName, ServiceInterface $service);

    public function getService($serviceName);
}
