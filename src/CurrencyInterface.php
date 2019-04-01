<?php

namespace Kobens\Currency;

/**
 * @property-read string $name
 * @property-read string $unit
 * @property-read string $subunit
 * @property-read string $symbol
 * @property-read int $scale
 */
interface CurrencyInterface
{
    /**
     * Return the full name of the currency.
     * Example: US Dollar | Bitcoin | Ethereaum
     */
    public function getName() : string;

    /**
     * Return the name of the currency's main unit.
     * Example: Dollar | Bitcoin | Ether
     */
    public function getUnit() : string;

    /**
     * Return the name of the currency's subunit.
     * Example: Cent | Satoshi | Wei
     */
    public function getSubunit() : string;

    /**
     * Return the abbreviation for the main unit
     * Example: USD | BTC | ETH
     */
    public function getSymbol() : string;

    /**
     * How many decimal points behind zero does the currency's subunit go.
     */
    public function getScale() : int;

}
