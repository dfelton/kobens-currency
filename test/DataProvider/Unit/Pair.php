<?php


namespace KobensTest\Currency\DataProvider\Unit;

use Kobens\Currency\Crypto\Bitcoin as BTC;
use Kobens\Currency\Crypto\Ethereum as ETH;
use Kobens\Currency\Crypto\Litecoin as LTC;
use Kobens\Currency\Fiat\USD;

class Pair
{
    public function getTestGetPairSymbolParams() : array
    {
        $params = [];
        foreach (['', '/', '_', '-', '+', 'foo', 'bar'] as $sep) {
            $params = \array_merge($params, [
                [new BTC(), new ETH(), $sep, BTC::PAIR_IDENTIFIER.$sep.ETH::PAIR_IDENTIFIER],
                [new BTC(), new LTC(), $sep, BTC::PAIR_IDENTIFIER.$sep.LTC::PAIR_IDENTIFIER],
                [new BTC(), new USD(), $sep, BTC::PAIR_IDENTIFIER.$sep.USD::PAIR_IDENTIFIER],

                [new ETH(), new BTC(), $sep, ETH::PAIR_IDENTIFIER.$sep.BTC::PAIR_IDENTIFIER],
                [new ETH(), new LTC(), $sep, ETH::PAIR_IDENTIFIER.$sep.LTC::PAIR_IDENTIFIER],
                [new ETH(), new USD(), $sep, ETH::PAIR_IDENTIFIER.$sep.USD::PAIR_IDENTIFIER],

                [new LTC(), new BTC(), $sep, LTC::PAIR_IDENTIFIER.$sep.BTC::PAIR_IDENTIFIER],
                [new LTC(), new ETH(), $sep, LTC::PAIR_IDENTIFIER.$sep.ETH::PAIR_IDENTIFIER],
                [new LTC(), new USD(), $sep, LTC::PAIR_IDENTIFIER.$sep.USD::PAIR_IDENTIFIER],

                [new USD(), new BTC(), $sep, USD::PAIR_IDENTIFIER.$sep.BTC::PAIR_IDENTIFIER],
                [new USD(), new LTC(), $sep, USD::PAIR_IDENTIFIER.$sep.LTC::PAIR_IDENTIFIER],
                [new USD(), new ETH(), $sep, USD::PAIR_IDENTIFIER.$sep.ETH::PAIR_IDENTIFIER],
            ]);
        }
        return $params;
    }

    public function getTestBaseCurrencyParams() : array
    {
        $btc = new BTC();
        $eth = new ETH();
        $ltc = new LTC();
        $usd = new USD();
        return [
            [$btc, $eth, $btc],
            [$btc, $ltc, $btc],
            [$btc, $usd, $btc],

            [$eth, $btc, $eth],
            [$eth, $ltc, $eth],
            [$eth, $usd, $eth],

            [$ltc, $btc, $ltc],
            [$ltc, $eth, $ltc],
            [$ltc, $usd, $ltc],

            [$usd, $btc, $usd],
            [$usd, $eth, $usd],
            [$usd, $ltc, $usd],
        ];
    }

    public function getTestQuoteCurrencyParams() : array
    {
        $btc = new BTC();
        $eth = new ETH();
        $ltc = new LTC();
        $usd = new USD();
        return [
            [$btc, $eth, $eth],
            [$btc, $ltc, $ltc],
            [$btc, $usd, $usd],

            [$eth, $btc, $btc],
            [$eth, $ltc, $ltc],
            [$eth, $usd, $usd],

            [$ltc, $btc, $btc],
            [$ltc, $eth, $eth],
            [$ltc, $usd, $usd],

            [$usd, $btc, $btc],
            [$usd, $eth, $eth],
            [$usd, $ltc, $ltc],
        ];
    }

    /**
     * @todo - not implemented
     */
    public function getTestBaseQtyParams() : array
    {
        return [];
    }

    /**
     * @todo more tests where would be nice, with more variation in currency pairs
     */
    public function getTestQuoteQtyParams() : array
    {
        return [
            [new BTC(), new USD(), '1',          '1',       '1'],
            [new BTC(), new USD(), '0.5',        '5000',    '2500'],
            [new BTC(), new USD(), '1.23456789', '1234.56', '1524.1481342784'],
            [new ETH(), new BTC(), '1.234567',   '0.03733', '0.04608638611'],
        ];
    }

    public function getTestScaleParams() : array
    {
        return [
            [new BTC(), new ETH(), 26],
            [new BTC(), new LTC(), 16],
            [new BTC(), new USD(), 10],

            [new ETH(), new BTC(), 26],
            [new ETH(), new LTC(), 26],
            [new ETH(), new USD(), 20],

            [new LTC(), new BTC(), 16],
            [new LTC(), new ETH(), 26],
            [new LTC(), new USD(), 10],

            [new USD(), new BTC(), 10],
            [new USD(), new LTC(), 10],
            [new USD(), new ETH(), 20],
        ];
    }
}