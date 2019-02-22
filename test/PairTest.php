<?php

namespace KobensTest\Currency;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Pair;
use Kobens\Currency\AbstractCurrency;

class PairTest extends TestCase
{

    public function testGetPairSymbol() : void
    {
        $baseCurrency = new class extends AbstractCurrency
        {
            const PAIR_IDENTIFIER = 'psilocybe';
        };
        $quoteCurrency = new class extends AbstractCurrency
        {
            const PAIR_IDENTIFIER = 'pluteus';
        };
        foreach (['', '_', '/'] as $str) {
            $pair = new Pair($baseCurrency, $quoteCurrency, $str);
            $this->assertEquals(
                "psilocybe{$str}pluteus",
                $pair->getPairSymbol()
            );
        }
    }

    public function testGetBaseCurrency() : void
    {
        $baseCurrency = new class extends AbstractCurrency { };
        $quoteCurrency = new class extends AbstractCurrency { };
        $pair = new Pair($baseCurrency, $quoteCurrency);
        $this->assertInstanceOf(
            get_class($baseCurrency),
            $pair->getBaseCurrency()
        );
    }

    public function testGetQuoteCurrency() : void
    {
        $baseCurrency = new class extends AbstractCurrency { };
        $quoteCurrency = new class extends AbstractCurrency { };
        $pair = new Pair($baseCurrency, $quoteCurrency);
        $this->assertInstanceOf(
            get_class($quoteCurrency),
            $pair->getQuoteCurrency()
        );
    }

    public function testGetBaseQty() : void
    {
        $this->markTestSkipped('not yet implemented');
    }

    public function testGetQuoteQty() : void
    {
        $tests = [
            // BTC/USD tests
            [8, 2, '1',          '1',          '1'],
            [8, 2, '0.5',        '5000',       '2500'],
            [8, 2, '1.23456789', '1234.56',    '1524.1481342784'],
            // ETH/BTC tests
            [6, 8, '1.234567',   '0.03733',    '0.04608638611'],
            // Dummy Tests
            [0, 0, '1',          '1',          '1'],
        ];
        foreach ($tests as $test) {
            $baseCurrency = $this->getMockForAbstractClass(
                AbstractCurrency::class,
                [], '', true, true, true,
                ['getSubunitDenomination']
            );
            $quoteCurrency = $this->getMockForAbstractClass(
                AbstractCurrency::class,
                [], '', true, true, true,
                ['getSubunitDenomination']
            );
            $baseCurrency->method('getSubunitDenomination')->willReturn($test[0]);
            $quoteCurrency->method('getSubunitDenomination')->willReturn($test[1]);
            $pair = new Pair($baseCurrency, $quoteCurrency);
            $this->assertEquals($test[4], $pair->getQuoteQty($test[2], $test[3]));
        }
    }
}