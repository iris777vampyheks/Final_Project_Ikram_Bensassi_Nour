<?php

return [

    'default' => env('MAIL_MAILER', 'smtp'),

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.mailtrap.io'), // Update to the correct host
            'port' => env('MAIL_PORT', 2525),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME', 'a9bb5c5fff3a54'),
            'password' => env('MAIL_PASSWORD', '272ea04133cb1b'),
            'timeout' => null,  
            'local_domain' => env('MAIL_EHLO_DOMAIN', ''),
        ],
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'javajavas793@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'Ikram'),
    ],

    'markdown' => [
        'theme' => 'default',
        'paths' => [resource_path('views/vendor/mail')],
    ],

    'pretend' => false,
    'log_channel' => env('MAIL_LOG_CHANNEL', 'stack'),
    'log' => true,
    
];
