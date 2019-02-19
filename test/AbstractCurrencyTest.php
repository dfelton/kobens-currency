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

