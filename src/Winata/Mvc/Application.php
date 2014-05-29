<?php

namespace Winata\Mvc;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Mvc\Controller\ControllerManager;

class Application
{
    protected $serviceManager;

    public function __construct($config, ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function setServiceManager(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function bootstrap()
    {
        return $this;
    }

    public function run()
    {
        $controller = new ControllerManager($this->serviceManager);
        $view       = $controller->getResult();

        $response = $this->serviceManager->getService('response');
        $response->setView($view);

        return $response;
    }
}
