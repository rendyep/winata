<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Mvc\View\Service;

use Winata\Service\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;
use Winata\Mvc\View\View;

class Factory implements ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new View($serviceManager);

        return $service;
    }
}
