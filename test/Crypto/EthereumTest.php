<?php

namespace KobensTest\Currency\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Crypto\Ethereum;

class EthereumTest extends TestCase
{
    /**
     * @var Ethereum
     */
    protected $testClass;

    public function setup() : void
    {
        $this->testClass = new Ethereum();
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('crypto', $this->testClass->getCurrencyType());
    }

    public function testGetCurrencyName() : void
    {
        $this->assertEquals('Ethereum', $this->testClass->getCurrencyName());
    }

    public function testGetMainUnitName() : void
    {
        $this->assertEquals('Ether', $this->testClass->getMainUnitName());
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $this->assertEquals('ETH', $this->testClass->getMainUnitAbbreviation());
    }

    public function testGetSubunitName() : void
    {
        $this->assertEquals('Wei', $this->testClass->getSubunitName());
    }

    public function testGetSubunitDenomination() : void
    {
        $this->assertEquals(18, $this->testClass->getSubunitDenomination());
    }

    public function testGetCacheIdentifier() : void
    {
        $this->assertEquals('eth', $this->testClass->getCacheIdentifier());
    }

    public function testGetPairIdentity() : void
    {
        $this->assertEquals('eth', $this->testClass->getPairIdentity());
    }

}
