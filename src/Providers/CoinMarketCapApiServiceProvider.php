<?php

namespace AxelDolislager\CoinMarketCapApi\Providers;

use Illuminate\Support\ServiceProvider;
use AxelDolislager\CoinMarketCapApi\CoinMarketCapApi;
use AxelDolislager\CoinMarketCapApi\Facades\CoinMarketCapApi as CoinMarketCapApiFacade;

class CoinMarketCapApiServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->singleton('coinmarketcapapi', function ($app) {
            return new CoinMarketCapApi($app->make('coinmarketcapapi.client'));
        });

        $this->app->bind('coinmarketcapapi.client', function () {
            return new \GuzzleHttp\Client([
                'base_uri' => config('coinmarketcapapi.endpoint'),
                'headers' => [
                    'X-CMC_PRO_API_KEY' => config('coinmarketcapapi.api_key')
                ]
            ]);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/coinmarketcap.php' => config_path('coinmarketcap.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                \AxelDolislager\CoinMarketCapApi\Commands\QuoteCommand::class,
            ]);
        }

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('CoinMarketCapApi', CoinMarketCapApiFacade::class);
        });
    }
}
