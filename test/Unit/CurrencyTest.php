<?php

declare(strict_types=1);

namespace KobensTest\Currency\Unit;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Currency;
use KobensTest\Currency\DataProvider\Unit\Currency as DataProvider;

final class CurrencyTest extends TestCase
{
    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetInstanceThrowsException()
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetInstanceThrowsException()
     */
    public function testGetInstanceThrowsException(string $symbol, string $exception)
    {
        $this->expectException($exception);
        Currency::getInstance($symbol);
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetInstance()
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetInstance()
     */
    public function testGetInstance($symbol, $expected)
    {
        $this->assertSame(Currency::getInstance($symbol), Currency::getInstance($symbol));
    }

    public function testGetSymbols()
    {
        $this->assertEquals(
            [
                'btc',
                'bch',
                'doge',
                'eth',
                'fil',
                'ltc',
                'xtz',
                'zec',
                'usd',
                '1inch',
                'aave',
                'alcx',
                'amp',
                'ankr',
                'bal',
                'bat',
                'bnt',
                'bond',
                'comp',
                'cube',
                'crv',
                'ctx',
                'dai',
                'enj',
                'ftm',
                'grt',
                'inj',
                'knc',
                'link',
                'lpt',
                'lrc',
                'mana',
                'matic',
                'mir',
                'mkr',
                'oxt',
                'paxg',
                'ren',
                'sand',
                'skl',
                'snx',
                'storj',
                'sushi',
                'uma',
                'uni',
                'yfi',
                'zrx',
            ],
            Currency::getSymbols()
        );
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetName
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetName()
     */
    public function testGetName(string $symbol, string $expected) : void
    {
        $this->assertEquals($expected, Currency::getInstance($symbol)->name);
        $this->assertEquals($expected, Currency::getInstance($symbol)->getName());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetUnit
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetUnit()
     */
    public function testGetUnit(string $symbol, string $expected) : void
    {
        $this->assertEquals($expected, Currency::getInstance($symbol)->unit);
        $this->assertEquals($expected, Currency::getInstance($symbol)->getUnit());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetSubunit
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetSubunit()
     */
    public function testGetSubunit(string $symbol, string $expected) : void
    {
        $this->assertEquals($expected, Currency::getInstance($symbol)->subunit);
        $this->assertEquals($expected, Currency::getInstance($symbol)->getSubunit());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetSymbol
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetSymbol()
     */
    public function testGetSymbol(string $symbol, string $expected) : void
    {
        $this->assertEquals($expected, Currency::getInstance($symbol)->symbol);
        $this->assertEquals($expected, Currency::getInstance($symbol)->getSymbol());
    }

    /**
     * @dataProvider \KobensTest\Currency\DataProvider\Unit\Currency::testGetScale
     * @see \KobensTest\Currency\DataProvider\Unit\Currency::testGetScale()
     */
    public function testGetScale(string $symbol, int $expected) : void
    {
        $this->assertEquals($expected, Currency::getInstance($symbol)->scale);
        $this->assertEquals($expected, Currency::getInstance($symbol)->getScale());
    }

    public function testCoverage()
    {
        $dataProvider = new DataProvider();
        $methods = ['Instance', 'Name', 'Unit', 'Subunit', 'Symbol', 'Scale'];
        foreach ($methods as $method) {
            $method = 'testGet'.$method;
            $symbols = Currency::getSymbols();
            foreach ($dataProvider->$method() as $test) {
                $index = \array_search($test[0], $symbols);
                if ($index === false) {
                    $this->addWarning('Data provider '.DataProvider::class.'::'.$method.' is not yielding unique tests.');
                } else {
                    unset($symbols[$index]);
                }
            }
            if ($symbols === []) {
                $this->assertTrue(true);
            } else {
                $this->addWarning(\sprintf(
                    'Data provider %s::%s missing test case for "%s"',
                    DataProvider::class,
                    $method,
                    \implode(',', $symbols)
                ));
            }
        }
   }
}
