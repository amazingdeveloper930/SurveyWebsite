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

	'credits' => [
        'registration_credits' => env('MAILGUN_DOMAIN'),
        'campaigns_credits' => env('MAILGUN_SECRET'),
        'featured_credits' => env('MAILGUN_SECRET'),
        'one_credits' => env('MAILGUN_SECRET')
    ],
	
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

    'facebook' => [
        'client_id' => '171036393708505',
        'client_secret' => '1b1f9f406ad7080972c8aa160b9fd6c5',
        'redirect' => env('APP_URL').'/auth/facebook/callback', // change on production
    ],

    'google' => [
        'client_id'     => '947611004988-usk27bqj09m3i3fo7tgucstfbu3uo60g.apps.googleusercontent.com',
        'client_secret' => 'bz3lpVjNLT90DnwsY2dgiPqh',
        'redirect' => env('APP_URL').'/auth/google/callback', // change on production
    ],
	 'twitter' => [
        'client_id'     => 'NlguEgr5EpmFeohYnlrkuExdA',
        'client_secret' => 'XO1dqY08wzYZc1YrzSiBIujf7SY4dmqjTDu4TRC3ogoGs4YS7g',
        'redirect' => env('APP_URL').'/auth/twitter/callback', // change on production
    ],

];
