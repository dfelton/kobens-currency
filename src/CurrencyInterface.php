<?php

namespace Kobens\Currency;

interface CurrencyInterface
{
    /**
     * Return the full name of the currency.
     * Example: US Dollar | Bitcoin | Ethereaum
     */
    public function getCurrencyName() : string;

    /**
     * Return the name of the currency's main unit.
     * Example: Dollar | Bitcoin | Ether
     */
    public function getMainUnitName() : string;

    /**
     * Return the abbreviation for the main unit
     * Example: USD | BTC | ETH
     */
    public function getMainUnitAbbreviation() : string;

    /**
     * Return the name of the currency's subunit.
     * Example: Cent | Satoshi | Wei
     */
    public function getSubunitName() : string;

    /**
     * How many decimal points behind zero does the currency's subunit go.
     */
    public function getScale() : int;

    /**
     * Return the string value to use in cache identifiers
     */
    public function getCacheIdentifier() : string;

    /**
     * Return the string value to use for this currency in a pair
     */
    public function getPairIdentity() : string;

    /**
     * Return the currency type (Fiat or Crypto)
     */
    public function getCurrencyType() : string;
}