<?php

namespace Kobens\Currency;

/**
 * @property-read CurrencyInterface $base
 * @property-read CurrencyInterface $quote
 * @property-read string $symbol
 */
interface PairInterface
{

    public function getSymbol(): string;

    public function getBase(): CurrencyInterface;

    public function getQuote(): CurrencyInterface;

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
    public function getBaseQty(string $quoteQty, string $quoteRate): string;

    /**
     * Return the equivilant quote currency quantity based
     * off the given base currency quantity and quote
     * currency rate.
     */
    public function getQuoteQty(string $baseQty, string $quoteRate): string;

}
