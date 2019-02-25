<?php

namespace Kobens\Currency;

use Kobens\Currency\CurrencyInterface as Currency;

class Pair implements PairInterface
{

    /**
     * @var Currency
     */
    protected $base;

    /**
     * @var Currency
     */
    protected $quote;

    /**
     * @var string
     */
    protected $separator;

    public function __construct(Currency $base, Currency $quote, string $separator = '')
    {
        $this->base = $base;
        $this->quote = $quote;
        $this->separator = $separator;
    }

    public function getPairSymbol() : string
    {
        return $this->base->getPairIdentity()
             . $this->separator
             . $this->quote->getPairIdentity();
    }

    public function getBaseCurrency() : Currency
    {
        return $this->base;
    }

    public function getQuoteCurrency() : Currency
    {
        return $this->quote;
    }

    /**
     * @todo Validate strings passed in conform to precision of the currencies
     */
    public function getBaseQty(string $quoteQty, string $quoteRate) : string
    {
        $value = \bcdiv($quoteQty, $quoteRate, $this->base->getScale());
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

    /**
     * @todo Validate strings passed in conform to precision of the currencies
     */
    public function getQuoteQty(string $baseQty, string $quoteRate) : string
    {
        $value = \bcmul(
            $baseQty,
            $quoteRate,
            $this->base->getScale() + $this->quote->getScale()
        );
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

}