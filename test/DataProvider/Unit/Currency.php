<?php


namespace KobensTest\Currency\DataProvider\Unit;

use Kobens\Currency\Currency as C;

/**
 * CurrencyTest Data Provider
 *
 * @see \KobensTest\Currency\Unit\CurrencyTest
 */
final class Currency
{

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetInstanceThrowsException()
     */
    public function testGetInstanceThrowsException() : array
    {
        return [
            ['foo',    \InvalidArgumentException::class],
            ['bar',    \InvalidArgumentException::class],
            ['fooBar', \InvalidArgumentException::class],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetInstance()
     */
    public function testGetInstance() : array
    {
        return [
            ['btc', C::getInstance('btc')],
            ['eth', C::getInstance('eth')],
            ['ltc', C::getInstance('ltc')],
            ['usd', C::getInstance('usd')],
            ['zec', C::getInstance('zec')],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetName()
     */
    public function testGetName() : array
    {
        return [
            ['btc', 'Bitcoin'],
            ['eth', 'Ethereum'],
            ['ltc', 'Litecoin'],
            ['usd', 'US Dollar'],
            ['zec', 'Zcash'],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetUnit()
     */
    public function testGetUnit() : array
    {
        return [
            ['btc', 'Bitcoin'],
            ['eth', 'Ether'],
            ['ltc', 'Litecoin'],
            ['usd', 'Dollar'],
            ['zec', 'Zcash'],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetSubunit()
     */
    public function testGetSubunit() : array
    {
        return [
            ['btc', 'Satoshi'],
            ['eth', 'Wei'],
            ['ltc', 'Litoshi'],
            ['usd', 'Cent'],
            ['zec', 'Zatoshi'],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetSymbol()
     */
    public function testGetSymbol() : array
    {
        return [
            ['btc', 'btc'],
            ['eth', 'eth'],
            ['ltc', 'ltc'],
            ['usd', 'usd'],
            ['zec', 'zec'],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetScale()
     */
    public function testGetScale() : array
    {
        return [
            ['btc', 8],
            ['eth', 18],
            ['ltc', 8],
            ['usd', 2],
            ['zec', 8],
        ];
    }
}