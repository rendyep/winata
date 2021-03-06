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

class AbstractActionController implements ServiceManagerAwareInterface
{
    protected $serviceManager;

    public function __construct(ServiceManagerInterface $serviceManager = null)
    {
        if ($serviceManager !== null) {
            $this->serviceManager = $serviceManager;
        }
    }

    public function __call($action, $arguments = null)
    {
        if (! method_exists($this, $action)) {
            return false;
        }

        return $this->$action();
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
