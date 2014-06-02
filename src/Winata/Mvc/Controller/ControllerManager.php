<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Mvc\Controller;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\ServiceManager\ServiceManagerAwareInterface;

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

        $classPath = $config['module_manager']['modules'][$router->getModule()]['controllers'][$router->getController()];
        $action = new $config['module_manager']['invokables'][$classPath]($this->serviceManager);

        ob_start();
        $view = $action->{$router->getAction(true)}();
        ob_end_clean();

        return $view;
    }
}
