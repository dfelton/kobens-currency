<?php

namespace KobensTest\Currency;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Exception\InvalidConstantException;
use KobensTest\Currency\TestAsset\FooCurrency;
use Kobens\Currency\AbstractCurrency;

class AbstractCurrencyTest extends TestCase
{
    /**
     * @var AbstractCurrency
     */
    protected $mock;

    /**
     * @var FooCurrency
     */
    protected $foo;

    public function setup() : void
    {
        $this->mock = $this->getMockForAbstractClass(AbstractCurrency::class);
        $this->foo = new FooCurrency();
    }

    public function testGetCurrencyNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getCurrencyName();
    }

    public function testGetCurrencyName() : void
    {
        $this->assertEquals(
            FooCurrency::CURRENCY_NAME,
            $this->foo->getCurrencyName()
        );
    }

    public function testGetMainUnitNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getMainUnitName();
    }

    public function testGetMainUnitName() : void
    {
        $this->assertEquals(
            FooCurrency::MAIN_UNIT,
            $this->foo->getMainUnitName()
        );
    }

    public function testGetMainUnitAbbreviationThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getMainUnitAbbreviation();
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $this->assertEquals(
            FooCurrency::MAIN_UNIT_ABBREVIATION,
            $this->foo->getMainUnitAbbreviation()
        );
    }

    public function testGetSubunitNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getSubunitName();
    }

    public function testGetSubunitName() : void
    {
        $this->assertEquals(
            FooCurrency::SUB_UNIT,
            $this->foo->getSubunitName()
        );
    }

    public function testGetSubunitDenominationThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getSubunitDenomination();
    }

    public function testGetSubunitDenomination() : void
    {
        $this->assertEquals(
            FooCurrency::DENOMINATION,
            $this->foo->getSubunitDenomination()
        );
    }

    public function testGetCacheIdentifierThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getCacheIdentifier();
    }

    public function testGetCacheIdentifier() : void
    {
        $this->assertEquals(
            FooCurrency::CACHE_IDENTIFIER,
            $this->foo->getCacheIdentifier()
        );
    }

    public function testGetPairIdentityThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getPairIdentity();
    }

    public function testGetPairIdentity() : void
    {
        $this->assertEquals(
            FooCurrency::PAIR_IDENTIFIER,
            $this->foo->getPairIdentity()
        );
    }

    public function testGetCurrencyTypeThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getCurrencyType();
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals(
            FooCurrency::CURRENCY_TYPE,
            $this->foo->getCurrencyType()
        );
    }
}

