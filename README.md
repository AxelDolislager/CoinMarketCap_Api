# CoinMarketCap Api
Laravel package for interacting with CoinMarketCap API.
Support for laravel ^8.0.


##Installation
###Requirements
- PHP ^8.0
- Composer

###Installation steps
To get the latest version simply run the following command in your project in a commandline interface.
``
composer require axeldolislager/coinmarketcapapi
``

Next you need to register the service provider in the `config/app.php` file and add the following to the `providers` key:
``
'providers' => [
    ...
    AxelDolislager\CoinMarketCapApi\Providers\CoinMarketCapApiServiceProvider::class,
    ...
]
``

You should also add the Facade in the `config/app.php` file in the `aliases` key:
``
'aliases' => [
    ...
    'CoinMarketCapApi' => AxelDolislager\CoinMarketCapApi\Facades\CoinMarketCapApi::class 
    ...
]
``

##Configuration
You can publish the configuration file using this command:
``
php artisan vendor:publish --provider="AxelDolislager\CoinMarketCapApi\Providers\CoinMarketCapApiServiceProvider"
``

Add the following key to your environment file (`.env`)
``
CMC_API_KEY=
``

TODO
