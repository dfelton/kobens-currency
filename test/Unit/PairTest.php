<?php

namespace KobensTest\Currency\Unit;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\CurrencyInterface as Currency;
use Kobens\Currency\Pair;

class PairTest extends TestCase
{

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::getTestGetPairSymbolParams
     */
    public function testGetPairSymbol(Currency $base, Currency $quote, string $separator, string $expected) : void
    {
        $pair = new Pair($base, $quote, $separator);
        $this->assertEquals($expected, $pair->getPairSymbol());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::getTestBaseCurrencyParams
     */
    public function testGetBaseCurrency(Currency $base, Currency $quote, Currency $expected) : void
    {
        $pair = new Pair($base, $quote);
        $this->assertSame($expected, $pair->getBaseCurrency());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::getTestQuoteCurrencyParams
     */
    public function testGetQuoteCurrency(Currency $base, Currency $quote, Currency $expected) : void
    {
        $pair = new Pair($base, $quote);
        $this->assertSame($expected, $pair->getQuoteCurrency());
    }

    /**
     * @todo
     */
    public function testGetBaseQty() : void
    {
        $this->markTestSkipped();
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::getTestQuoteQtyParams
     */
    public function testGetQuoteQty(Currency $base, Currency $quote, string $baseQty, string $quoteRate, string $expected) : void
    {
        $pair = new Pair($base, $quote);
        $this->assertEquals($expected, $pair->getQuoteQty($baseQty, $quoteRate));
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::getTestScaleParams
     */
    public function testGetScale(Currency $base, Currency $quote, $expected) : void
    {
        $pair = new Pair($base, $quote);
        $this->assertEquals($expected, $pair->getScale());
    }

}
