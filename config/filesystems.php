<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'throw' => false,
        ],

        // BACKEND
        'partenaire' => [
            'driver' => 'local',
            'root' => storage_path('app/public/partenaire'),
            'url' => env('APP_URL').'/storage/partenaire',
            'throw' => false,
        ],
        // 'partenaires' => [
        //     'driver' => 'local',
        //     'root' => '../../frontend/public/img/partenaire',
        //     'url' => env('APP_URL').'/storage/partenaire',
        //     'throw' => false,
        // ],
        'prestation' => [
            'driver' => 'local',
            'root' => storage_path('app/public/prestation'),
            'url' => env('APP_URL').'/storage/prestation',
            'throw' => false,
        ],
        'formation' => [
            'driver' => 'local',
            'root' => storage_path('app/public/formation'),
            'url' => env('APP_URL').'/storage/formation',
            'throw' => false,
        ],
        'service' => [
            'driver' => 'local',
            'root' => storage_path('app/public/service'),
            'url' => env('APP_URL').'/storage/service',
            'throw' => false,
        ],
        'sousservice' => [
            'driver' => 'local',
            'root' => storage_path('app/public/sousservice'),
            'url' => env('APP_URL').'/storage/sousservice',
            'throw' => false,
        ],
        'typeprestation' => [
            'driver' => 'local',
            'root' => storage_path('app/public/typeprestation'),
            'url' => env('APP_URL').'/storage/typeprestation',
            'throw' => false,
        ],

        // FRONTEND
        'partenaires' => [
            'driver' => 'local',
            'root' => '../../frontend/public/img/partenaire',
            'throw' => false,
        ],
        'prestations' => [
            'driver' => 'local',
            'root' => '../../frontend/public/img/prestation',
            'throw' => false,
        ],
        'formations' => [
            'driver' => 'local',
            'root' => '../../frontend/public/img/formation',
            'throw' => false,
        ],
        'typeprestations' => [
            'driver' => 'local',
            'root' => '../../frontend/public/img/typeprestation',
            'throw' => false,
        ],
        'services' => [
            'driver' => 'local',
            'root' => '../../frontend/public/img/service',
            'throw' => false,
        ],
        'sousservices' => [
            'driver' => 'local',
            'root' => '../../frontend/public/img/sousservice',
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('storage/partenaire') => storage_path('app/public/partenaire'),
        public_path('storage/prestation') => storage_path('app/public/prestation'),
        public_path('storage/formation') => storage_path('app/public/formation'),
        public_path('storage/typeprestation') => storage_path('app/public/typeprestation'),
        public_path('storage/service') => storage_path('app/public/service'),
    ],

];
