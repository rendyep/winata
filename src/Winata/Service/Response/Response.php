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
use Winata\Service\ServiceInterface;
use Winata\Service\View\View;

class Response implements ServiceInterface
{
    protected $serviceManager;

    protected $view;

    public function __construct(ServiceManagerInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function setView(View $view)
    {
        $this->view = $view;
    }

    public function getView()
    {
        return $this->view;
    }

    public function send()
    {
        echo $this->view;
    }
}
