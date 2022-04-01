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
        'client_id' => env('FACEBOOK_CLIENT_ID','284618690529876'),
        'client_secret' => env('FACEBOOK_CLIEN_SECRET','ceab1d2c1d1a9e301898e49d5b8cc7b6'),
        'redirect' => env('FACEBOOK_REDIRECT_URI','http://localhost:8000/auth/facebook/callback'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', '367008951145-bt7cs7j186t525kr6htjnj9flvcv6r3t.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIEN_SECRET','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'),
        'redirect' => env('GOOGLE_REDIRECT_URI','http://localhost:8000/auth/google/callback'),
    ],

];
