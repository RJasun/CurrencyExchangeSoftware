<?php
declare(strict_types=1);

namespace App;

class Currency
{
    private string $currencyIsoCode;
    private int $amount;

    public function __construct(string $currencyIsoCode, float $amountInUnits)
    {
        $this->currencyIsoCode = $currencyIsoCode;
        $this->amount = intval($amountInUnits * 100);
    }

    public function getCurrencyIso(): string
    {
        return $this->currencyIsoCode;
    }

    public function getAmountInCents(): int
    {
        return $this->amount;
    }

    public function __toString(): string
    {
        return number_format($this->amount / 100, 2) . " " . $this->currencyIsoCode;
    }
}