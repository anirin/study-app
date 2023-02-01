<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    
    'twitter' => [
        'client_id'       => 'ODdJWDZEZXl4Q21NaHQ5ZWFaWXE6MTpjaQ',
        'client_secret'   => '5O3GfJYdv9oi17AFG739x4AJbj7h68mb2mkLzpDLkSMkhRffV1',
        'redirect'        => 'https://e284b1d9ae8f4729905c341f40c23abb.vfs.cloud9.ap-northeast-1.amazonaws.com/login/twitter/callback',
        'oauth'           => 2,
    ],
];
