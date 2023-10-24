<?php
declare(strict_types=1);

use App\UserInput;
use App\ConversionRateApi;
use App\Currency;

require_once 'vendor/autoload.php';

$sourceCurrency = UserInput::getCurrencyAndAmount();
$targetCurrencyIso = strtoupper(UserInput::getTargetCurrencyIso());

$apiClient = new ConversionRateApi();
$rate = $apiClient->getConversionRate($sourceCurrency->getCurrencyIso(), $targetCurrencyIso);

$convertedAmountInCents = $sourceCurrency->getAmountInCents() * $rate;

$targetCurrency = new Currency($targetCurrencyIso, $convertedAmountInCents / 100);
echo "{$sourceCurrency} is converted to {$targetCurrency}." . PHP_EOL;
