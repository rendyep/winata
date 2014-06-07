<?php

/**
* Winata (https://github.com/rendyep/winata)
*
* @link https://github.com/rendyep/winata for the canonical source repository
* @copyright Copyright (c) 20014 Winata Technology Inc. (https://github.com/rendyep/winata)
* @license https://github.com/rendyep/winata/blob/master/LICENCE
*/

return array(
    'service' => array(
        'factories' => array(
            'router' =>  '\\Winata\\Mvc\\Router\\Service\\Factory',
            'request' => '\\Winata\\Mvc\\Http\\Request\\Service\\Factory',
            'response' => '\\Winata\\Mvc\\Http\\Response\\Service\\Factory',
            'sessionManager' => '\\Winata\\Session\\Service\\Factory',
            'view' => '\\Winata\\Mvc\\View\\Service\\Factory',
            'navigation' => '\\Winata\Navigation\Navigation\Factory'
        ),
        'invokables' => array(
        ),
    ),
    'options' => array(
        'default_session_namespace' => '\Winata\Session'
    )
);
