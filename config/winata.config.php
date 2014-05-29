<?php

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
