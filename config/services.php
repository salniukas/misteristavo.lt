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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'paysera' => [
        'projectid' => env('PAYSERA_ID'),
        'password' => env('PAYSERA_PASS'),
        'accepturl' => 'http://misteristavo.lt/uzsakymas-pavyko',
        'cancelurl' => 'http://misteristavo.lt/uzsakymas-nepavyko',
        'callbackurl' => 'http://misteristavo.lt/paysera/callback',
        'version' => '1.6',
        'test' => 0,
    ],

];
