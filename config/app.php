<?php
/*
 * The Datasource entry below will need to be edited before it can be used for the MSSQL connection. If you are NOT going to use MSSQL and instead have a MySQL then you
 * will need to change the 'driver' => 'Cake\Database\Driver\Sqlserver' to 'driver' => 'Cake\Database\Driver\Mysql'. Remember that you will also need to set a SALT and uncomment
 * that out.
 * 
 * If you are going to use debugging you will also need to turn 'debug' => FALSE to 'debug' => TRUE. Just remember to turn that back off BEFORE you push that to your live environment.
 */
return [
    'debug' => FALSE,

    'App' => [
        'namespace' => 'App',
        'encoding' => env('APP_ENCODING', 'UTF-8'),
        'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_US'),
        'base' => false,
        'dir' => 'src',
        'webroot' => 'webroot',
        'wwwRoot' => WWW_ROOT,
        'fullBaseUrl' => false,
        'imageBaseUrl' => 'img/',
        'cssBaseUrl' => 'css/',
        'jsBaseUrl' => 'js/',
        'paths' => [
            'plugins' => [ROOT . DS . 'plugins' . DS],
            'templates' => [APP . 'Template' . DS],
            'locales' => [APP . 'Locale' . DS],
        ],
    ],

    /*
    'Security' => [
        'salt' => '',
    ],
    */
    
    'Asset' => [
        // 'timestamp' => true,
    ],

    'Cache' => [
        'default' => [
            'className' => 'File',
            'path' => CACHE,
            'url' => env('CACHE_DEFAULT_URL', null),
        ],

        '_cake_core_' => [
            'className' => 'File',
            'prefix' => 'myapp_cake_core_',
            'path' => CACHE . 'persistent/',
            'serialize' => true,
            'duration' => '+1 years',
            'url' => env('CACHE_CAKECORE_URL', null),
        ],

        '_cake_model_' => [
            'className' => 'File',
            'prefix' => 'myapp_cake_model_',
            'path' => CACHE . 'models/',
            'serialize' => true,
            'duration' => '+1 years',
            'url' => env('CACHE_CAKEMODEL_URL', null),
        ],
    ],

    'Error' => [
        'errorLevel' => E_ALL,
        'exceptionRenderer' => 'Cake\Error\ExceptionRenderer',
        'skipLog' => [],
        'log' => false,
        'trace' => false,
    ],

    'EmailTransport' => [
        'default' => [
            'className' => 'Mail',
            // The following keys are used in SMTP transports
            'host' => 'localhost',
            'port' => 25,
            'timeout' => 30,
            'username' => 'user',
            'password' => 'secret',
            'client' => null,
            'tls' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],

    'Email' => [
        'default' => [
            'transport' => 'default',
            'from' => 'support@atlantatech.edu',
            //'charset' => 'utf-8',
            //'headerCharset' => 'utf-8',
        ],
    ],

    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Sqlserver',
            'persistent' => false,
            //'host' => 'YOUR DATABASE HOST',
            //'port' => 'YOUR PORT (DEFAULT 1433)',
            //'username' => 'MSSQL ADMIN ACCOUNT (DEFAULT SA)',
            //'password' => 'ADMIN PASSWORD',
            //'database' => 'DATABASE TABLE,
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => false,
        ],
    ],

    /**
     * Configures logging options
     */
    'Log' => [
        'debug' => [
            'className' => 'Cake\Log\Engine\FileLog',
            'path' => LOGS,
            'file' => 'debug',
            'levels' => ['notice', 'info', 'debug'],
            'url' => env('LOG_DEBUG_URL', null),
        ],
        'error' => [
            'className' => 'Cake\Log\Engine\FileLog',
            'path' => LOGS,
            'file' => 'error',
            'levels' => ['warning', 'error', 'critical', 'alert', 'emergency'],
            'url' => env('LOG_ERROR_URL', null),
        ],
    ],

    'Session' => [
        'defaults' => 'php',
    ],
];
