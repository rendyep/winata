<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

namespace Winata\ServiceManager;

use Winata\Service\ServiceInterface;

interface ServiceManagerInterface
{
    public function setService($serviceName, ServiceInterface $service);

    public function getService($serviceName);
}
