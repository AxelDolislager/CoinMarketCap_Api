<?php

namespace AxelDolislager\CoinMarketCapApi\Facades;

use Illuminate\Support\Facades\Facade;

class CoinMarketCapApi extends Facade{
    protected static function getFacadeAccessor(){
        return 'CoinMarketCapApi';
    }
}
