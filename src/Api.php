<?php

namespace AxelDolislager\CoinMarketCapApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class Api {
    protected $api_key = '';
    protected $http_client = null;
    protected $endpoint = '';
    protected $debug = false;
    protected $verify = false;



    public function __construct() {
        $this->_init();
    }
    private function _init(){
        $this->api_key = config('coinmarketcap.api_key');
        $this->endpoint = config('coinmarketcap.endpoint');
        $this->http_client = new Client([
            'base_uri' => $this->endpoint
        ]);
    }

    public function _call( $method, $params , $type = 'GET'){
        $headers = [
            'X-CMC_PRO_API_KEY' => $this->api_key
        ];
        $url = $method.'?'.http_build_query($params);

        try {
            $request = $this->http_client->request($type, $url, [
                'headers' => $headers,
                'debug'  => $this->debug,
                'verify' => $this->verify
            ]);

            return json_decode($request->getBody(), true);
        }catch(ClientException $e) {
            return json_decode($e->getResponse()->getBody(), true);
        }

    }

    public function setDebug($debug){
        $this->debug = $debug;
    }
    public function getDebug(){
        return $this->debug;
    }
    public function setVerify($verify){
        $this->verify = $verify;
    }
    public function getVerify(){
        return $this->verify;
    }




    public function quotes( $params = [] ){
        return $this->_call('/v2/cryptocurrency/quotes/latest', $params);
    }
}
?>
