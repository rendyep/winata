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
            'session' => '\\Winata\\Session\\Service\\Factory',
            'view' => '\\Winata\\Mvc\\View\\Service\\Factory'
        ),
        'invokables' => array(
        ),
    ),
    'options' => array(
        'session_identity' => 'WINATA_SESSION_IDENTITY'
    )
);
