<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Session;

use Winata\ServiceManager\ServiceManagerInterface;

class SessionStorage
{
    protected $serviceManager;

    public function __construct(ServiceManagerInterface $serviceManager, $sessionNamespace = null)
    {
        $this->serviceManager = $serviceManager;
        $config = $this->serviceManager->getConfig();

        if ($sessionNamespace === null || empty($sessionNamespace)) {
            $sessionNamespace = $config['options']['default_session_namespace'];
        }

        $this->sessionNamespace = $sessionNamespace;

        $sessionManager = $this->serviceManager->getService('sessionManager');
        $sessionManager->addSession($this);
    }
}

