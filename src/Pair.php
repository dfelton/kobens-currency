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
     * @todo - not implemented
     *
     * Return the equivilant base currency quantity based
     * off the given quote currency quantity and quote
     * currency rate.
     */
    public function getBaseQty(string $quoteQty, string $quoteRate) : string
    {
        throw new \Exception(\sprintf('"%s" not implemented.', __MEHTOD__));
        return '';
    }

    /**
     * Return the equivilant quote currency quantity based
     * off the given base currency quantity and quote
     * currency rate.
     */
    public function getQuoteQty(string $baseQty, string $quoteRate) : string
    {
        $value = \bcmul($baseQty, $quoteRate, $this->getScale());
        $value = \rtrim($value, '0');
        $value = \rtrim($value, '.');

        return $value;
    }

    public function getScale() : int
    {
        return $this->base->getScale() + $this->quote->getScale();
    }
}