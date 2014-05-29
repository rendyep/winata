<?php

namespace Winata\ServiceManager;

interface ServiceManagerAwareInterface
{
    public function setServiceManager(ServiceManagerInterface $serviceManager);

    public function getServiceManager();
}
