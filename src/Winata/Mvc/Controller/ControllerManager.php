<?php

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
