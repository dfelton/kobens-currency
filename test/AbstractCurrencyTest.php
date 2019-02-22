<?php

namespace KobensTest\Currency;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Exception\InvalidConstantException;
use Kobens\Currency\AbstractCurrency;

class AbstractCurrencyTest extends TestCase
{

    public function testGetCurrencyNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getCurrencyName();
    }

    public function testGetCurrencyName() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const CURRENCY_NAME = 'Conocybe';
        };
        $this->assertEquals('Conocybe', $anon->getCurrencyName());
    }

    public function testGetMainUnitNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getMainUnitName();
    }

    public function testGetMainUnitName() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const MAIN_UNIT = 'Copelandia';
        };
        $this->assertEquals('Copelandia', $anon->getMainUnitName());
    }

    public function testGetMainUnitAbbreviationThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getMainUnitAbbreviation();
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const MAIN_UNIT_ABBREVIATION = 'Galerina';
        };
        $this->assertEquals('Galerina', $anon->getMainUnitAbbreviation());
    }

    public function testGetSubunitNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getSubunitName();
    }

    public function testGetSubunitName() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const SUB_UNIT = 'Gymnopilus';
        };
        $this->assertEquals('Gymnopilus', $anon->getSubunitName());
    }

    public function testGetSubunitDenominationThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getSubunitDenomination();
    }

    public function testGetSubunitDenomination() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const DENOMINATION = 80085;
        };
        $this->assertEquals(80085, $anon->getSubunitDenomination());
    }

    public function testGetCacheIdentifierThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getCacheIdentifier();
    }

    public function testGetCacheIdentifier() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const CACHE_IDENTIFIER = 'Inocybe';
        };
        $this->assertEquals('Inocybe', $anon->getCacheIdentifier());
    }

    public function testGetPairIdentityThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getPairIdentity();
    }

    public function testGetPairIdentity() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const PAIR_IDENTIFIER = 'Mycena';
        };
        $this->assertEquals('Mycena', $anon->getPairIdentity());
    }

    public function testGetCurrencyTypeThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $anon = new class extends AbstractCurrency { };
        $anon->getCurrencyType();
    }

    public function testGetCurrencyType() : void
    {
        $anon = new class extends AbstractCurrency
        {
            const CURRENCY_TYPE = 'Panaeolina';
        };
        $this->assertEquals('Panaeolina', $anon->getCurrencyType());
    }

}
