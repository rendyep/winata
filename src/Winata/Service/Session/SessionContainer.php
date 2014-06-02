<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Service\Session;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceInterface;

class SessionContainer implements ServiceInterface
{
    protected $serviceManager;

    protected $sessionStorage;

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        $config = $this->serviceManager->getConfig();
        if (! isset($_SESSION[$config['options']['session_identity']])) {
            $_SESSION[$config['options']['session_identity']] = new SessionStorage();
        }

        $this->sessionStorage = $_SESSION[$config['options']['session_identity']];
    }

    public function getSessionStorage()
    {
        return $this->sessionStorage;
    }
}
