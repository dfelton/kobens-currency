<?php

namespace Kobens\Currency;

interface PairInterface
{
    /**
     * @return string
     */
    public function getPairSymbol() : string;

    /**
     * @return \Kobens\Currency\CurrencyInterface
     */
    public function getBaseCurrency() : \Kobens\Currency\CurrencyInterface;

    /**
     * @return \Kobens\Currency\CurrencyInterface
     */
    public function getQuoteCurrency() : \Kobens\Currency\CurrencyInterface;

    /**
     * Return the equivalent base currency quantity based
     * off the given quote currency quantity and quote
     * currency rate.
     *
     * Returns only exact values (as opposed to allowing repeating numbers).
     * Therefore amount returned will be up to the allowed smallest unit of
     * measurement of the base currency, without going over the cost of the
     * quote currency supplied quote quantity.
     */
    public function getBaseQty(string $quoteQty, string $quoteRate) : string;

    /**
     * Return the equivilant quote currency quantity based
     * off the given base currency quantity and quote
     * currency rate.
     *
     * @param string $baseQty
     * @param string $quoteRate
     * @return string
     */
    public function getQuoteQty(string $baseQty, string $quoteRate) : string;

    /**
     * @return int
     */
    public function getScale() : int;

}
