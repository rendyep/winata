<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Mvc\View;

use Winata\Service\ServiceManagerInterface;

class View
{
    protected $serviceManager;

    protected $layout = 'default.phtml';

    protected $title = 'Winata';

    protected $titleSeparator = '-';

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
        require $config['view_manager']['layout_path'] . '/default.phtml';
        $layout = ob_get_contents();
        ob_end_clean();

        return $layout;
    }

    public function setProperties(array $properties = null)
    {
        $this->properties = $properties;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function setTitleSeparator($titleSeparator)
    {
        $this->titleSeparator = $titleSeparator;

        return $this;
    }

    public function getTitleSeparator()
    {
        return $this->titleSeparator;
    }

    public function prependTitle($title)
    {
        $this->title = $title . ' ' . $this->titleSeparator . ' ' . $this->title;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        $config = $this->serviceManager->getConfig();
        $route  = $this->serviceManager->getService('router');

        ob_start();
        require $config['view_manager']['module_path']
            . '/' . $route->getModule()
            . '/' . $route->getController()
            . '/' . $route->getAction()
            . '.phtml';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function setLayout($layout)
    {
        if (file_exists($config['view_manager']['layout_path'] . '/' . $layout)) {
            $this->layout = $layout;
        } elseif (file_exists($config['view_manager']['layout_path'] . '/' . $layout . 'phtml')) {
            $this->layout = $layout . '.phtml';
        } else {
            throw new \Exception("Layout dengan nama \"{$layout}\" tidak ditemukan!");
        }

        return $this;
    }

    public function getLayout()
    {
        return $this->layout;
    }
}
