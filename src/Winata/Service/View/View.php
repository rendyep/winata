<?php

namespace Winata\Service\View;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceInterface;

class View implements ServiceInterface
{
    protected $serviceManager;

    protected $template;

    protected $content;

    protected $properties;

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function __set($key, $value)
    {
        $this->properties[$key] = $value;
    }

    public function __get($key)
    {
        if (! isset($this->properties[$key])) {
            return null;
        }

        return $this->properties[$key];
    }

    public function __toString()
    {
        $config = $this->serviceManager->getConfig();
        $route  = $this->serviceManager->getService('router');

        ob_start();
        require $config['view_manager']['module_path']
            . '/' . $route->getModule()
            . '/' . $route->getController()
            . '/' . $route->getAction()
            . '.phtml';
        $this->content = ob_get_contents();
        ob_end_clean();

        ob_start();
        require $config['view_manager']['template_path'] . '/default.phtml';
        $template = ob_get_contents();
        ob_end_clean();

        return $template;
    }

    public function setProperties(array $properties = null)
    {
        $this->properties = $properties;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
