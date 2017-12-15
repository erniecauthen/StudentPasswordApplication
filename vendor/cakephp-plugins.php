<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Ldap' => $baseDir . '/vendor/queencitycodefactory/ldap/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];