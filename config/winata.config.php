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
            'router' =>  '\\Winata\\Service\\Router\\RouterFactory',
            'request' => '\\Winata\\Service\\Request\\RequestFactory',
            'response' => '\\Winata\\Service\\Response\\ResponseFactory',
            'session' => '\\Winata\\Service\\Session\\SessionFactory',
            'view' => '\\Winata\\Service\\View\\ViewFactory'
        ),
        'invokables' => array(
        ),
    ),
    'options' => array(
        'session_identity' => 'WINATA_SESSION_IDENTITY'
    )
);
