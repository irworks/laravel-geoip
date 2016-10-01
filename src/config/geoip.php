<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */

    'log_failures' => true,

    /*
    |--------------------------------------------------------------------------
    | Include Currency in Results
    |--------------------------------------------------------------------------
    |
    | When enabled the system will do it's best in deciding the user's currency
    | by matching their ISO code to a preset list of currencies.
    |
    */

    'include_currency' => true,

    /*
    |--------------------------------------------------------------------------
    | Default Service
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default storage driver that should be used
    | by the framework.
    |
    | Supported: "maxmind", "ipapi"
    |
    */

    'service' => env('GEOIP_SERVICE', 'ipapi'),

    /*
    |--------------------------------------------------------------------------
    | Storage Specific Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many storage drivers as you wish.
    |
    */

    'services' => [

        'maxmind' => [
            'class' => \Torann\GeoIP\Services\MaxMind::class,
            'type' => env('GEOIP_DRIVER', 'database'), // database or web_service
            'user_id' => env('GEOIP_USER_ID'),
            'license_key' => env('GEOIP_LICENSE_KEY'),
            'database_path' => storage_path('app/geoip.mmdb'),
            'update_url' => 'https://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz',
            'locales' => ['en'],
        ],

        'ipapi' => [
            'class' => \Torann\GeoIP\Services\IPApi::class,
            'secure' => env('GEOIP_IPAPI_SECURE', true),
            'continent_path' => storage_path('app/continents.json'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Location
    |--------------------------------------------------------------------------
    |
    | Return when a location is not found.
    |
    */

    'default_location' => [
        'ip' => '127.0.0.0',
        'iso_code' => 'US',
        'country' => 'United States',
        'city' => 'New Haven',
        'state' => 'CT',
        'state_name' => 'Connecticut',
        'postal_code' => '06510',
        'lat' => 41.31,
        'lon' => -72.92,
        'timezone' => 'America/New_York',
        'continent' => 'NA',
        'default' => true,
        'currency' => null,
    ],

];