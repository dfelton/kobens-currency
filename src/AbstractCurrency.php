<?php

namespace Kobens\Currency;

abstract class AbstractCurrency implements CurrencyInterface
{
    const CURRENCY_TYPE          = null;
    const CURRENCY_NAME          = null;
    const MAIN_UNIT              = null;
    const MAIN_UNIT_ABBREVIATION = null;
    const SUB_UNIT               = null;
    const DENOMINATION           = null;
    const PAIR_IDENTIFIER        = null;
    const CACHE_IDENTIFIER       = null;
    
    public function getCurrencyType() : string
    {
        return self::CURRENCY_TYPE;
    }
    
    public function getCurrencyName() : string
    {
        return self::CURRENCY_NAME;
    }
    
    public function getMainUnitAbbreviation() : string
    {
        return self::MAIN_UNIT_ABBREVIATION;
    }
    
    public function getMainUnitName() : string
    {
        return self::MAIN_UNIT;
    }
    
    public function getSubunitName() : string
    {
        return self::SUB_UNIT;
    }
    
    public function getSubunitDenomination() : int
    {
        return self::DENOMINATION;
    }
    
    public function getPairIdentity() : string
    {
        return self::PAIR_IDENTIFIER;
    }
    
    public function getCacheIdentifier() : string
    {
        return self::CACHE_IDENTIFIER;
    }
    
}