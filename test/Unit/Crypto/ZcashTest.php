<?php

namespace KobensTest\Currency\Unit\Fiat;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Crypto\Zcash;

class ZcashTest extends TestCase
{
    /**
     * @var Zcash
     */
    protected $testClass;

    public function setup() : void
    {
        $this->testClass = new Zcash();
    }

    public function testGetCurrencyType() : void
    {
        $this->assertEquals('crypto', $this->testClass->getCurrencyType());
    }

    public function testGetCurrencyName() : void
    {
        $this->assertEquals('Zcash', $this->testClass->getCurrencyName());
    }

    public function testGetMainUnitName() : void
    {
        $this->assertEquals('Zcash', $this->testClass->getMainUnitName());
    }

    public function testGetMainUnitAbbreviation() : void
    {
        $this->assertEquals('ZEC', $this->testClass->getMainUnitAbbreviation());
    }

    public function testGetSubunitName() : void
    {
        $this->assertEquals('Zatoshi', $this->testClass->getSubunitName());
    }

    public function testGetScale() : void
    {
        $this->assertEquals(8, $this->testClass->getScale());
    }

    public function testGetCacheIdentifier() : void
    {
        $this->assertEquals('zec', $this->testClass->getCacheIdentifier());
    }

    public function testGetPairIdentity() : void
    {
        $this->assertEquals('zec', $this->testClass->getPairIdentity());
    }

}
