<?php

namespace KobensTest\Currency\Unit\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Crypto\Bitcoin;

class BitcoinTest extends TestCase
{
    /**
     * @var Bitcoin
     */
    protected $testClass;

    public function setup() : void
    {
        $this->testClass = new Bitcoin();
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('crypto', $this->testClass->getCurrencyType());
    }

    public function testGetCurrencyName() : void
    {
        $this->assertEquals('Bitcoin', $this->testClass->getCurrencyName());
    }

    public function testGetMainUnitName() : void
    {
        $this->assertEquals('Bitcoin', $this->testClass->getMainUnitName());
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $this->assertEquals('BTC', $this->testClass->getMainUnitAbbreviation());
    }

    public function testGetSubunitName() : void
    {
        $this->assertEquals('Satoshi', $this->testClass->getSubunitName());
    }

    public function testGetSubunitDenomination() : void
    {
        $this->assertEquals(8, $this->testClass->getSubunitDenomination());
    }

    public function testGetCacheIdentifier() : void
    {
        $this->assertEquals('btc', $this->testClass->getCacheIdentifier());
    }

    public function testGetPairIdentity() : void
    {
        $this->assertEquals('btc', $this->testClass->getPairIdentity());
    }

}
