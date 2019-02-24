<?php

namespace KobensTest\Currency\Unit\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Fiat\USD;

class USDTest extends TestCase
{
    /**
     * @var USD
     */
    protected $testClass;

    public function setup() : void
    {
        $this->testClass = new USD();
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('fiat', $this->testClass->getCurrencyType());
    }

    public function testGetCurrencyName() : void
    {
        $this->assertEquals('US Dollar', $this->testClass->getCurrencyName());
    }

    public function testGetMainUnitName() : void
    {
        $this->assertEquals('Dollar', $this->testClass->getMainUnitName());
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $this->assertEquals('USD', $this->testClass->getMainUnitAbbreviation());
    }

    public function testGetSubunitName() : void
    {
        $this->assertEquals('Cent', $this->testClass->getSubunitName());
    }

    public function testgetScale() : void
    {
        $this->assertEquals(2, $this->testClass->getScale());
    }

    public function testGetCacheIdentifier() : void
    {
        $this->assertEquals('usd', $this->testClass->getCacheIdentifier());
    }

    public function testGetPairIdentity() : void
    {
        $this->assertEquals('usd', $this->testClass->getPairIdentity());
    }

}
