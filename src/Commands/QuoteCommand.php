<?php

namespace AxelDolislager\CoinMarketCapApi\Commands;

use Illuminate\Console\Command;
use AxelDolislager\CoinMarketCapApi\Facades\CoinMarketCapApi;

class QuoteCommand extends Command{
    protected $signature = 'coinmarketcapapi:quote {symbol}';
    protected $description = 'Get a quote on the provided crypto currency using id or symbol.';

    public function handle(){
        $symbol = $this->argument('symbol');
        $quote = CoinMarketCapApi::quotes(['symbol' => $symbol]);

        $this->info(json_encode($quote));
    }
}
