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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => "1224905547977530",
        'client_secret' => 'afafe833580f5b7649a065bb85566a40',
        'redirect' => "http://localhost:8080/LEARN_PHP/Laravel/MyProject/public/admin/callback",
    ],
    'google' => [
        'client_id' => '612977505354-no7jis85aihpv6b34sm5u0bsqccbq06b.apps.googleusercontent.com',
        'client_secret' => 'fwxTSn9HJ9olh5vxbpROebq4',
        'redirect' => 'http://localhost:8080/LEARN_PHP/Laravel/MyProject/public/admin/callback_google',
    ],


];
