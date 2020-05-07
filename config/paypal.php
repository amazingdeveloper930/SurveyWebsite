<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AcqjAXcxHuADJSdBD-1sGSxX5xBEcznqCV8NK3CCggmRSf6GvcpU8_yOtpiSorDPTTH7cERPsWioWLNr'),
    'secret' => env('PAYPAL_SECRET','EAO5ttkVC6cf4-Jj3fruLCFWfTRkrz2kHZermEkVV1aet5aTLo0zLumuXdnDzfvj9BMIENzyXnOWyE9H'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','live'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];