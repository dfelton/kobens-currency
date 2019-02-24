<?php

namespace KobensTest\Currency\Unit\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Crypto\Litecoin;

class LitecoinTest extends TestCase
{
    /**
     * @var Litecoin
     */
    protected $testClass;

    public function setup() : void
    {
        $this->testClass = new Litecoin();
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('crypto', $this->testClass->getCurrencyType());
    }

    public function testGetCurrencyName() : void
    {
        $this->assertEquals('Litecoin', $this->testClass->getCurrencyName());
    }

    public function testGetMainUnitName() : void
    {
        $this->assertEquals('Litecoin', $this->testClass->getMainUnitName());
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $this->assertEquals('LTC', $this->testClass->getMainUnitAbbreviation());
    }

    public function testGetSubunitName() : void
    {
        $this->assertEquals('Litoshi', $this->testClass->getSubunitName());
    }

    public function testGetScale() : void
    {
        $this->assertEquals(8, $this->testClass->getScale());
    }

    public function testGetCacheIdentifier() : void
    {
        $this->assertEquals('ltc', $this->testClass->getCacheIdentifier());
    }

    public function testGetPairIdentity() : void
    {
        $this->assertEquals('ltc', $this->testClass->getPairIdentity());
    }

}
