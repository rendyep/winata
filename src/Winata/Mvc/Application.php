<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Mvc;

use Winata\Service\ServiceManagerInterface;
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
