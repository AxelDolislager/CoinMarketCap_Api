<?php

namespace AxelDolislager\CoinMarketCapApi\Providers;

use AxelDolislager\CoinMarketCapApi\Api;
use AxelDolislager\CoinMarketCapApi\Commands\QuoteCommand;

use Illuminate\Support\ServiceProvider;

class CoinMarketCapApiServiceProvider extends ServiceProvider{
    protected $defer = true;

    public function boot(){
        if($this->app->runningInConsole()){
            $this->commands([
                QuoteCommand::class
            ]);
        }

        $this->publishes([
            __DIR__.'/../config/coinmarketcap.php' => config_path('coinmarketcap.php'),
        ]);
    }

    public function register(){
        $this->app->singleton('CoinMarketCapApi', function() {
            return new Api();
        });
    }

    public function provides(){
        return ['CoinMarketCapApi'];
    }
}
