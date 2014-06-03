<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Mvc\Controller;

use Winata\Service\ServiceManagerInterface;
use Winata\Service\ServiceManagerAwareInterface;

class ControllerManager implements ServiceManagerAwareInterface
{
    protected $serviceManager;

    public function __construct(ServiceManagerInterface $serviceManager = null)
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

    public function getResult()
    {
        $config = $this->serviceManager->getConfig();
        $router = $this->serviceManager->getService('router');

        $controller = $router->getControllerHandler();

        ob_start();
        $view = $controller->{$router->getAction(true)}();
        ob_end_clean();

        return $view;
    }
}
