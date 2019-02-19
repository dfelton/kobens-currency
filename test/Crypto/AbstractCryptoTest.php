<?php

namespace KobensTest\Currency\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Crypto\AbstractCrypto;
use Kobens\Currency\Exception\InvalidConstantException;

class AbstractFiatTest extends TestCase
{
    /**
     * @var AbstractCrypto
     */
    protected $mock;

    public function setup() : void
    {
        $this->mock = $this->getMockForAbstractClass(AbstractCrypto::class);
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('crypto', $this->mock->getCurrencyType());
    }

    public function testGetCurrencyNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getCurrencyName();
    }

    public function testGetMainUnitNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getMainUnitName();
    }

    public function testGetMainUnitAbbreviationThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getMainUnitAbbreviation();
    }

    public function testGetSubunitNameThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getSubunitName();
    }

    public function testGetSubunitDenominationThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getSubunitDenomination();
    }

    public function testGetCacheIdentifierThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getCacheIdentifier();
    }

    public function testGetPairIdentityThrowsException() : void
    {
        $this->expectException(InvalidConstantException::class);
        $this->mock->getPairIdentity();
    }

}
