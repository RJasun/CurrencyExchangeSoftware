<?php

namespace App;

class UserInput
{
    public static function getCurrencyAndAmount(): Currency
    {
        $input = readline("Enter amount and currency, (example - 100 USD) : ");
        preg_match('/^(\d+(\.\d{1,2})?)\s?(\w+)$/', $input, $matches);

        $currency = strtoupper($matches[3]);
        $amount = floatval($matches[1]);
        return new Currency($currency, $amount);
    }

    public static function getTargetCurrencyIso(): string
    {
        return readline("Enter currency you would like to convert to, (example - EUR) : ");
    }
}