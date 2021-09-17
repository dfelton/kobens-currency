<?php

declare(strict_types=1);

namespace KobensTest\Currency\Unit;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\CurrencyInterface as Currency;
use Kobens\Currency\Pair;

class PairTest extends TestCase
{

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::testGetSymbol
     * @see \KobensTest\Currency\DataProvider\Unit\Pair::testGetSymbol()
     */
    public function testGetSymbol(Currency $base, Currency $quote, string $separator, string $expected) : void
    {
        $pair = new Pair($base, $quote, $separator);
        $this->assertEquals($expected, $pair->symbol);
        $this->assertEquals($expected, $pair->getSymbol());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::testGetBase
     * @see \KobensTest\Currency\DataProvider\Unit\Pair::testGetBase()
     */
    public function testGetBase(Currency $base, Currency $quote, Currency $expected) : void
    {
        $pair = new Pair($base, $quote);
        $this->assertSame($expected, $pair->base);
        $this->assertSame($expected, $pair->getBase());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::testGetQuote
     * @see \KobensTest\Currency\DataProvider\Unit\Pair::testGetQuote()
     */
    public function testGetQuote(Currency $base, Currency $quote, Currency $expected) : void
    {
        $pair = new Pair($base, $quote);
        $this->assertSame($expected, $pair->quote);
        $this->assertSame($expected, $pair->getQuote());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::testGetBaseQty
     * @see \KobensTest\Currency\DataProvider\Unit\Pair::testGetBaseQty()
     */
    public function testGetBaseQty(Currency $base, Currency $quote, $quoteQty, $quoteRate, $expected) : void
    {
        $this->assertEquals($expected, (new Pair($base, $quote))->getBaseQty($quoteQty, $quoteRate));
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Pair::testGetQuoteQty
     * @see \KobensTest\Currency\DataProvider\Unit\Pair::testGetQuoteQty()
     */
    public function testGetQuoteQty(Currency $base, Currency $quote, string $baseQty, string $quoteRate, string $expected) : void
    {
        $this->assertEquals($expected, (new Pair($base, $quote))->getQuoteQty($baseQty, $quoteRate));
    }
}
