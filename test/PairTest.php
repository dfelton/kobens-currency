<?php

namespace KobensTest\Currency;

use PHPUnit\Framework\TestCase;
use Kobens\Currency\Pair;
use Kobens\Currency\AbstractCurrency;
use Kobens\Currency\Crypto\Bitcoin;
use Kobens\Currency\Crypto\Ethereum;
use Kobens\Currency\Fiat\USD;

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
        $bitcoin  = new Bitcoin();
        $ethereum = new Ethereum();
        $usd      = new USD();
        $tests = [
            [$bitcoin,  $usd,     '1',          '1',          '1'],
            [$bitcoin,  $usd,     '0.5',        '5000',       '2500'],
            [$bitcoin,  $usd,     '1.23456789', '1234.56',    '1524.1481342784'],
            [$ethereum, $bitcoin, '1.234567',   '0.03733',    '0.04608638611'],
        ];
        foreach ($tests as $test) {
            $pair = new Pair($test[0], $test[1]);
            $this->assertEquals($test[4], $pair->getQuoteQty($test[2], $test[3]));
        }
    }

}
