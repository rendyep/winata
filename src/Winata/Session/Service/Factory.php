<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Session;

use Winata\Service\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;
use Winata\Session\SessionManager;

class Factory implements ServiceProviderFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new SessionManager($serviceManager);

        return $service;
    }
}
