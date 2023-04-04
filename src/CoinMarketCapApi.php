<?php

namespace AxelDolislager\CoinMarketCapApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CoinMarketCapApi{
    protected $client;

    protected function init(){
        $this->client = new Client([
            'base_uri' => config('coinmarketcap.endpoint'),
            'headers' => [
                'X-CMC_PRO_API_KEY' => config('coinmarketcap.api_key')
            ],
            'verify' => false,
        ]);
    }

    public function __construct(){
        $this->init();
    }

    public function quotes(array $parameters){
        $response = $this->client->get('/v1/cryptocurrency/quotes/latest', [
            'query' => $parameters
        ]);
        return json_decode((string) $response->getBody(), true);
    }
}
