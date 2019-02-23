<?php

namespace KobensTest\Currency\Unit\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Fiat\AbstractFiat;
use Kobens\Currency\Exception\InvalidConstantException;

class AbstractFiatTest extends TestCase
{
    /**
     * @var AbstractFiat
     */
    protected $mock;

    public function setup() : void
    {
        $this->mock = $this->getMockForAbstractClass(AbstractFiat::class);
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('fiat', $this->mock->getCurrencyType());
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
