<?php

namespace AxelDolislager\CoinMarketCapApi\Commands;

use Illuminate\Console\Command;
use AxelDolislager\CoinMarketCapApi\Api as CoinMarketCapApi;

class QuoteCommand extends Command{
    protected $signature = 'coinmarketcapapi:quote {coins}';
    protected $description = 'Get a quote on the provided crypto currency using id or symbol.';

    public function handle(){
        $api = new CoinMarketCapApi();
        $quote = $api->quotes(['id' => $this->argument('coins')]);
        //check array!

        $this->info();
    }
}
