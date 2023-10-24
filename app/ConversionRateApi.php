<?php

namespace App;

use GuzzleHttp\Client;

class ConversionRateApi
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }


    public function getConversionRate(string $baseCurrency, string $targetCurrency): float
    {
        $response = $this->client->get('https://api.freecurrencyapi.com/v1/latest', [
            'query' => [
                'apikey' => '',
                'base_currency' => $baseCurrency,
                'currencies' => $targetCurrency,
            ]
        ]);

        $responseData = json_decode($response->getBody()->getContents(), true);
        return $responseData['data'][$targetCurrency];
    }
}