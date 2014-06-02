<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\Service\Response;

use Winata\ServiceManager\ServiceManagerInterface;
use Winata\Service\ServiceFactoryInterface;

class ResponseFactory implements ServiceFactoryInterface
{
    public static function createService(ServiceManagerInterface $serviceManager)
    {
        $service = new Response($serviceManager);

        return $service;
    }
}
