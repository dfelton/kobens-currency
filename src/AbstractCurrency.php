<?php

namespace Kobens\Currency;

use \Kobens\Currency\Exception\InvalidConstantException;

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
        if (   \is_string(static::CURRENCY_TYPE) === false
            || \strlen(static::CURRENCY_TYPE) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'CURRENCY_TYPE'
            ));
        }
        return static::CURRENCY_TYPE;
    }

    public function getCurrencyName() : string
    {
        if (   \is_string(static::CURRENCY_NAME) === false
            || \strlen(static::CURRENCY_NAME) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'CURRENCY_NAME'
            ));
        }
        return static::CURRENCY_NAME;
    }

    public function getMainUnitAbbreviation() : string
    {
        if (   \is_string(static::MAIN_UNIT_ABBREVIATION) === false
            || \strlen(static::MAIN_UNIT_ABBREVIATION) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'MAIN_UNIT_ABBREVIATION'
            ));
        }
        return static::MAIN_UNIT_ABBREVIATION;
    }

    public function getMainUnitName() : string
    {
        if (   \is_string(static::MAIN_UNIT) === false
            || \strlen(static::MAIN_UNIT) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'MAIN_UNIT'
            ));
        }
        return static::MAIN_UNIT;
    }

    public function getSubunitName() : string
    {
        if (   \is_string(static::SUB_UNIT) === false
            || \strlen(static::SUB_UNIT) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'SUB_UNIT'
            ));
        }
        return static::SUB_UNIT;
    }

    public function getSubunitDenomination() : int
    {
        if (\is_int(static::DENOMINATION) === false) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be an integer',
                static::class,
                'DENOMINATION'
            ));
        }
        return static::DENOMINATION;
    }

    public function getPairIdentity() : string
    {
        if (   \is_string(static::PAIR_IDENTIFIER) === false
            || \strlen(static::PAIR_IDENTIFIER) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'PAIR_IDENTIFIER'
            ));
        }
        return static::PAIR_IDENTIFIER;
    }

    public function getCacheIdentifier() : string
    {
        if (   \is_string(static::CACHE_IDENTIFIER) === false
            || \strlen(static::CACHE_IDENTIFIER) === 0
        ) {
            throw new InvalidConstantException(\sprintf(
                '%s::%s must be a string with a length greater than zero',
                static::class,
                'CACHE_IDENTIFER'
            ));
        }
        return static::CACHE_IDENTIFIER;
    }

}