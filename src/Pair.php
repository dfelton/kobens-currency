<?php

namespace Kobens\Currency;

use Kobens\Currency\CurrencyInterface as Currency;

class Pair implements PairInterface
{
    /**
     * @var Currency
     */
    private $base;

    /**
     * @var Currency
     */
    private $quote;

    /**
     * @var string
     */
    private $symbol;

    public function __construct(Currency $base, Currency $quote, string $separator = '')
    {
        $this->base = $base;
        $this->quote = $quote;
        $this->symbol = $this->base->symbol.$separator.$this->quote->symbol;
    }

    public function getSymbol() : string
    {
        return $this->symbol;
    }

    public function getBase() : Currency
    {
        return $this->base;
    }

    public function getQuote() : Currency
    {
        return $this->quote;
    }

    /**
     * @todo Validate strings passed in conform to precision of the currencies
     */
    public function getBaseQty(string $quoteQty, string $quoteRate) : string
    {
        $value = \bcdiv($quoteQty, $quoteRate, $this->base->scale);
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

    /**
     * @todo Validate strings passed in conform to precision of the currencies
     */
    public function getQuoteQty(string $baseQty, string $rate) : string
    {
        $value = \bcmul($baseQty, $rate, $this->base->scale + $this->quote->scale);
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'symbol':
                return $this->symbol;
            case 'quote':
                return $this->quote;
            case 'base':
                return $this->base;
            default:
                throw \Error('Invalid magic method getter');
        }
    }

}