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
        if ($base->symbol === $quote->symbol) {
            throw new \LogicException('Base and Quote Currency params cannot contain the same symbol.');
        }
        $this->base = $base;
        $this->quote = $quote;
        $this->symbol = $this->base->symbol.$separator.$this->quote->symbol;
    }

    final public function getSymbol(): string
    {
        return $this->symbol;
    }

    final public function getBase(): Currency
    {
        return $this->base;
    }

    final public function getQuote(): Currency
    {
        return $this->quote;
    }

    /**
     * @todo Validate strings passed in conform to precision of the currencies
     */
    final public function getBaseQty(string $quoteQty, string $rate): string
    {
        $value = \bcdiv($quoteQty, $rate, $this->base->scale);
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

    /**
     * @todo Validate strings passed in conform to precision of the currencies
     */
    final public function getQuoteQty(string $baseQty, string $rate): string
    {
        $value = \bcmul($baseQty, $rate, $this->base->scale + $this->quote->scale);
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

    public function __get(string $name)
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