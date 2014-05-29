<?php

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
        if (!isset($_SESSION[$config['options']['session_identity'])) {
            $_SESSION[$config['options']['session_identity']] = new SessionStorage();
        }

        $this->sessionStorage = $_SESSION[$config['options']['session_identity']];
    }

    public function getSessionStorage()
    {
        return $this->sessionStorage;
    }
}
