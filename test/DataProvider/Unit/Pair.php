<?php


namespace KobensTest\Currency\DataProvider\Unit;

use Kobens\Currency\Crypto\Bitcoin as BTC;
use Kobens\Currency\Crypto\Ethereum as ETH;
use Kobens\Currency\Fiat\USD;

class Pair
{
    public function getTestGetPairSymbolParams() : array
    {
        $params = [];
        foreach (['', '/', '_', '-', '+', 'foo', 'bar'] as $sep) {
            $params = \array_merge($params, [
                [new BTC(), new ETH(), $sep, BTC::PAIR_IDENTIFIER.$sep.ETH::PAIR_IDENTIFIER],
                [new BTC(), new USD(), $sep, BTC::PAIR_IDENTIFIER.$sep.USD::PAIR_IDENTIFIER],

                [new ETH(), new BTC(), $sep, ETH::PAIR_IDENTIFIER.$sep.BTC::PAIR_IDENTIFIER],
                [new ETH(), new USD(), $sep, ETH::PAIR_IDENTIFIER.$sep.USD::PAIR_IDENTIFIER],

                [new USD(), new BTC(), $sep, USD::PAIR_IDENTIFIER.$sep.BTC::PAIR_IDENTIFIER],
                [new USD(), new ETH(), $sep, USD::PAIR_IDENTIFIER.$sep.ETH::PAIR_IDENTIFIER],
            ]);
        }
        return $params;
    }

    public function getTestBaseCurrencyParams() : array
    {
        $btc = new BTC();
        $eth = new ETH();
        $usd = new USD();
        return [
            [$btc, $usd, $btc],
            [$btc, $eth, $btc],
            [$eth, $btc, $eth],
            [$eth, $usd, $eth],
            [$usd, $btc, $usd],
            [$usd, $eth, $usd],
        ];
    }

    public function getTestQuoteCurrencyParams() : array
    {
        $btc = new BTC();
        $eth = new ETH();
        $usd = new USD();
        return [
            [$btc, $usd, $usd],
            [$btc, $eth, $eth],
            [$eth, $btc, $btc],
            [$eth, $usd, $usd],
            [$usd, $btc, $btc],
            [$usd, $eth, $eth],
        ];
    }

    /**
     * @todo
     */
    public function getTestBaseQtyParams() : array
    {
        return [];
    }

    public function getTestQuoteQtyParams() : array
    {
        return [
            [new BTC(), new USD(), '1',             '1',          '1'],
            [new BTC(), new USD(), '0.5',        '5000',       '2500'],
            [new BTC(), new USD(), '1.23456789', '1234.56',    '1524.1481342784'],
            [new ETH(), new BTC(), '1.234567',      '0.03733',    '0.04608638611'],
        ];
    }

    /**
     * @todo
     */
    public function getTestScaleParams() : array
    {
        return [
            [new BTC(), new USD(), 10],
            [new BTC(), new ETH(),   ],
            [new ETH(), new USD(),   ],
        ];
    }
}