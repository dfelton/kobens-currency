<?php

namespace Kobens\Currency;

class Pair implements PairInterface
{
    /**
     * @var \Kobens\Currency\CurrencyInterface
     */
    protected $baseCurrency;

    /**
     * @var \Kobens\Currency\CurrencyInterface
     */
    protected $quoteCurrency;

    /**
     * @var string
     */
    protected $symbolSeparator;

    public function __construct(
        \Kobens\Currency\CurrencyInterface $baseCurrency,
        \Kobens\Currency\CurrencyInterface $quoteCurrency,
        string $symbolSeparator = ''
    ) {
        $this->baseCurrency = $baseCurrency;
        $this->quoteCurrency = $quoteCurrency;
        $this->symbolSeparator = $symbolSeparator;
    }

    /**
     * @return string
     */
    public function getPairSymbol() : string
    {
        return sprintf(
            '%s%s%s',
            $this->baseCurrency->getPairIdentity(),
            $this->symbolSeparator,
            $this->quoteCurrency->getPairIdentity()
        );
    }

    /**
     * @return \Kobens\Currency\CurrencyInterface
     */
    public function getBaseCurrency() : \Kobens\Currency\CurrencyInterface
    {
        return $this->baseCurrency;
    }

    /**
     * @return \Kobens\Currency\CurrencyInterface
     */
    public function getQuoteCurrency() : \Kobens\Currency\CurrencyInterface
    {
        return $this->quoteCurrency;
    }

    /**
     * TODO
     *
     * Return the equivilant base currency quantity based
     * off the given quote currency quantity and quote
     * currency rate.
     *
     * @param string $quoteQty
     * @param string $quoteRate
     * @return string
     */
    public function getBaseQty(string $quoteQty, string $quoteRate) : string
    {
        throw new \Exception(sprintf('"%s" not implemented.', __MEHTOD__));
        return '';
    }

    /**
     * TODO
     *
     * Return the equivilant quote currency quantity based
     * off the given base currency quantity and quote
     * currency rate.
     *
     * @param string $baseQty
     * @param string $quoteRate
     * @return string
     */
    public function getQuoteQty(string $baseQty, string $quoteRate) : string
    {
        throw new \Exception(sprintf('"%s" not implemented.', __MEHTOD__));
        return '';
    }
}