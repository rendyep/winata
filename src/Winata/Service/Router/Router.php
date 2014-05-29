<?php

namespace Winata\Service\Router;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceInterface;

class Router implements ServiceInterface
{
    protected $serviceManager;

    protected $route;

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        $this->parseRoute();
    }

    protected function getDefaultRoute()
    {
        return array(
            false,
            '',
            'index.php'
        );
    }

    protected function parseRoute()
    {
        $config     = $this->serviceManager->getConfig();
        $uri        = substr($_SERVER['REQUEST_URI'], 1);
        $arrayOfUri = explode('/', $uri);
        $route      = array();

        if (empty($arrayOfUri) || in_array($uri, $this->getDefaultRoute())) {
            $route = $config['module_manager']['default'];
        } else {
            $moduleManager = $config['module_manager'];
            $modules       = $moduleManager['modules'];

            if (isset($arrayOfUri[0]) && ! empty($arrayOfUri[0]) && isset($modules[$arrayOfUri[0]])) {
                $route['module'] = $arrayOfUri[0];
            } else {
                throw new \Exception("Module \"{$arrayOfUri[0]}\" not found!");
            }

            if (isset($arrayOfUri[1]) && ! empty($arrayOfUri[1])) {
                $controllers = $modules[$arrayOfUri[0]]['controllers'];
                if (isset($controllers[$arrayOfUri[1]])) {
                    $route['controller'] = $arrayOfUri[1];
                } else {
                    throw new \Exception("Controller \"{$arrayOfUri[1]}\" not found!");
                }
            } elseif (empty($arrayOfUri[1])) {
                $route['controller'] = $modules[$arrayOfUri[0]]['default']['controller'];
            } else {
                throw new \Exception("Controller \"{$arrayOfUri[1]}\" not found!");
            }

            if (isset($arrayOfUri[2]) && ! empty($arrayOfUri[2])) {
                $action = $modules[$arrayOfUri[0]]['controllers'][$arrayOfUri[1]];
                if (isset($controllers[$arrayOfUri[2]])) {
                    $route['action'] = $arrayOfUri[2];
                } else {
                    throw new \Exception("Action \"{$arrayOfUri[1]}\" not found!");
                }
            } elseif (empty($arrayOfUri[2])) {
                $route['action'] = $modules[$arrayOfUri[0]]['default']['action'];
            } else {
                throw new \Exception("Action \"{$arrayOfUri[1]}\" not found!");
            }
        }

        $this->route = $route;

        return $this->route;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getModule($camelCase = false)
    {
        $module = $this->route['module'];

        if ($camelCase) {
            return ucfirst($module);
        }

        return $module;
    }

    public function getController($camelCase = false)
    {
        $controller = $this->route['controller'];

        if ($camelCase) {
            return ucfirst($controller);
        }

        return $controller;
    }

    public function getAction($toAction = false)
    {
        $action = $this->route['action'];

        if ($toAction) {
            return $action . 'Action';
        }

        return $action;
    }

    public function getRequests()
    {
        return $this->route['requests'];
    }
}
