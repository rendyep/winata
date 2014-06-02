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
use Winata\Service\ServiceFactoryInterface;

class SessionContainerFactory implements ServiceProviderFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new SessionContainer($serviceManager);

        return $service->getSessionStorage();
    }
}
