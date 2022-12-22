<?php

declare(strict_types=1);

namespace App\ValueObjects;

class Currency
{
    protected $code;
    protected $symbol;
    protected $precision;
    protected $title;
    protected $thousandSeparator;
    protected $decimalSeparator;
    protected $vatPercentage;
    protected $symbolPlacement;

    // Data ini ambil dari config?
    private static $currencies = [
        'USD' => [
            'title' => 'US Dollar',
            'code' => 'USD',
            'symbol' => '$',
            'precision' => 2,
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'symbolPlacement' => 'before',
            'vatPercentage' => 725,
        ],
        'EUR' => [
            'title' => 'Euro',
            'code' => 'EUR',
            'symbol' => '€',
            'precision' => 2,
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'symbolPlacement' => 'before',
            'vatPercentage' => 2000,
        ]
    ];

    public function __construct($code)
    {
        $currency = $this->getCurrency($code);
        foreach ($currency as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    protected function defaultCurrency()
    {
        return $this->getCurrency("EUR");
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getVatPercentage()
    {
        return $this->vatPercentage;
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function getPrecision()
    {
        return $this->precision;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getThousandSeparator()
    {
        return $this->thousandSeparator;
    }

    public function getDecimalSeparator()
    {
        return $this->decimalSeparator;
    }

    public function getSymbolPlacement()
    {
        return $this->symbolPlacement;
    }

    public function toArray()
    {
        return [
            'code' => $this->getCode(),
            'title' => $this->getTitle(),
            'symbol' => $this->getSymbol(),
            'precision' => $this->getPrecision(),
            'thousandSeparator' => $this->getThousandSeparator(),
            'decimalSeparator' => $this->getDecimalSeparator(),
            'symbolPlacement' => $this->getSymbolPlacement(),
        ];
    }

    public static function getAllCurrencies()
    {
        return self::$currencies;
    }

    public function getCurrency($code)
    {
        return isset(self::$currencies[$code]) ? self::$currencies[$code] : $this->defaultCurrency();
    }
}
