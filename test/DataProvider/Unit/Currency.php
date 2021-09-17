<?php

declare(strict_types=1);

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
            ['bch',  C::getInstance('bch')],
            ['btc',  C::getInstance('btc')],
            ['eth',  C::getInstance('eth')],
            ['ltc',  C::getInstance('ltc')],
            ['usd',  C::getInstance('usd')],
            ['zec',  C::getInstance('zec')],
            ['fil',  C::getInstance('fil')],
            ['amp',  C::getInstance('amp')],
            ['bal',  C::getInstance('bal')],
            ['bat',  C::getInstance('bat')],
            ['comp', C::getInstance('comp')],
            ['crv',  C::getInstance('crv')],
            ['dai',  C::getInstance('dai')],
            ['knc',  C::getInstance('knc')],
            ['link', C::getInstance('link')],
            ['mana', C::getInstance('mana')],
            ['oxt',  C::getInstance('oxt')],
            ['paxg', C::getInstance('paxg')],
            ['ren',  C::getInstance('ren')],
            ['storj',C::getInstance('storj')],
            ['snx',  C::getInstance('snx')],
            ['uma',  C::getInstance('uma')],
            ['uni',  C::getInstance('uni')],
            ['yfi',  C::getInstance('yfi')],
            ['zrx',  C::getInstance('zrx')],
        ];
    }

    /**
     * @see \KobensTest\Currency\Unit\CurrencyTest::testGetName()
     */
    public function testGetName() : array
    {
        return [
            ['bch', 'BCash'],
            ['btc', 'Bitcoin'],
            ['eth', 'Ethereum'],
            ['ltc', 'Litecoin'],
            ['usd', 'US Dollar'],
            ['zec', 'Zcash'],
            ['fil',  'Filecoin'],
            ['amp',  'Amp Token'],
            ['bal',  'Balancer'],
            ['bat',  'Basic Attention Token'],
            ['comp', 'Compound Governance Token'],
            ['crv',  'Curve DAO Token'],
            ['dai',  'Dai Stablecoin'],
            ['knc',  'Kyber Network'],
            ['link', 'Chainlink'],
            ['mana', 'Decentraland'],
            ['oxt',  'Orchid'],
            ['paxg', 'PAX Gold'],
            ['ren',  'RenVM'],
            ['storj','Storj'],
            ['snx',  'Synthetix'],
            ['uma',  'Universal Market Access'],
            ['uni',  'Uniswap'],
            ['yfi',  'Yearn Finance'],
            ['zrx',  '0x'],
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