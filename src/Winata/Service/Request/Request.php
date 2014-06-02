<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Service\Request;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceInterface;

class Request implements ServiceInterface, \ArrayAccess
{
    protected $serviceManager;

    protected $params = array();

    protected $posts = array();

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        $this->parseRequest();
    }

    protected function parseRequest()
    {
        $this->params = $this->serviceManager->getService('router')->getRequests();
        $this->posts  = $_POST;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function isPost()
    {
        return (! empty($this->posts));
    }

    public function offsetSet($offset, $value)
    {
        //block
    }

    public function offsetExists($offset)
    {
        if (isset($this->posts[$offset])) {
            return true;
        } elseif (isset($this->params[$offset])) {
            return true;
        } else {
            return false;
        }
    }

    public function offsetUnset($offset)
    {
        //block
    }

    public function offsetGet($offset)
    {
        if (isset($this->posts[$offset])) {
            return $this->posts[$offset];
        } elseif (isset($this->params[$offset])) {
            return $this->params[$offset];
        } else {
            return null;
        }
    }

    public function __set($name, $value)
    {
        //block
    }

    public function __get($name)
    {
        if (isset($this->posts[$name])) {
            return $this->posts[$name];
        } elseif (isset($this->params[$name])) {
            return $this->params[$name];
        } else {
            return null;
        }
    }
}
