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

class SessionManager
{
    protected $sessions = array();

    public function __construct(serviceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function addSession(SessionStorage $session)
    {
        $this->sessions[$session] = $session;
    }

    public function getSession($sessionNamespace)
    {
        if (isset($this->sessions[$sessionNamespace])) {
            return $this->sessions[$sessionNamespace];
        } else {
            $this->sessions[$sessionNamespace] = new SessionStorage($this->serviceManager, $sessionNamespace);
        }
    }
}
