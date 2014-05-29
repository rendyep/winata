<?php

namespace Winata\Service;

use Winata\ServiceManager\ServiceManagerInterface;

interface ServiceInterface
{
    public function __construct(ServiceManagerInterface $serviceManager);
}
