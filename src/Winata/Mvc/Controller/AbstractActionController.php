<?php

namespace Winata\Mvc\Controller;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\ServiceManager\ServiceManagerAwareInterface;
use Winata\Service\ServiceInterface;

class AbstractActionController implements ServiceManagerAwareInterface
{
    protected $serviceManager;

    public function __construct(ServiceManagerInterface $serviceManager = null)
    {
        if ($serviceManager !== null) {
            $this->serviceManager = $serviceManager;
        }
    }

    public function setServiceManager(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}
