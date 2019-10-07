<?php

return  [
    'default'=> 'file_system', //默认值
    'file_system' => [
        'adapter' => 'fileSystem', // 适配器的文件名 eg：fileSystem 指向 /lib/adapter/log/fileSystem.php
        'options' => [
            'cache_dir' => ROOT . '/data/cache/filesystem',
//            'key_pattern' => '/.*/Di',
//            'dir_level' => 3,
//            'dir_permission' => 0777,
//            'file_permission' => 0777,
        ],/*
        'plugins' => [
            'exception_handler' => [
                'throw_exceptions' => false
            ],
            'serializer' => [
                'serializer' => 'phpserialize'
            ]
        ],*/
    ],
/*
    'redis' => [
        'adapter' => 'redis',
        'options' => [
            'server'    =>'172.16.0.99:6379',

            'database'  =>'0',
            'namespace' =>'apple_d_867',
            'writable'  =>true,
            'readable'  =>true,
        ],
        'plugins' => [
            'exception_handler' => [
                'throw_exceptions' => false
            ],
            'serializer' => [
                'serializer' => 'phpserialize'
            ]
        ],
    ],
    'memory' => [
        'adapter' => 'memory',/*
        'options' => [
            'memory_limit' => 0
        ],
        'plugins' => [
            'exception_handler' => [
                'throw_exceptions' => false
            ],
        ],
    ],
    'mysql'=>[],
*/
];