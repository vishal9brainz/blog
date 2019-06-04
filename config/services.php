<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
'google' => [
   
   'client_id' =>'201519835614-nn8shr4hdcli1unsuu6k0s8al5c8nin2.apps.googleusercontent.com',       
    'client_secret' =>'kpeLVxxkiUQiUEyFuc08V0ux', 
    'redirect' => 'http://localhost:8000/callback'
    ],
'facebook' => [
   
    'client_id' =>'418048292035034',       
    'client_secret' =>'fc0fdabbbf2173e9e94818e32e740c11', 
    'redirect' => 'https://phplaravel-224667-684245.cloudwaysapps.com/callback'
    ],

];
