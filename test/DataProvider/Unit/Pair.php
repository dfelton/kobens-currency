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
     * @todo add more tests with more currency variations
     */
    public function getTestBaseQtyParams() : array
    {
        return [
            [new BTC(), new USD(), '1.00',   '1',    '1'],
            [new BTC(), new USD(), '2.50',   '1',    '2.5'],
            [new BTC(), new USD(), '5000',   '7500', '0.66666666'],
            [new BTC(), new USD(), '123.45', '1234', '0.10004051'],
        ];
    }

    /**
     * @todo add more tests with more currency variations
     */
    public function getTestQuoteQtyParams() : array
    {
        return [
            [new BTC(), new USD(), '1',          '1',       '1'],
            [new BTC(), new USD(), '0.5',        '5000',    '2500'],
            [new BTC(), new USD(), '1.23456789', '1234.56', '1524.1481342784'],
            [new BTC(), new USD(), '0.66666666', '7500',    '4999.99995'],
            [new ETH(), new BTC(), '1.234567',   '0.03733', '0.04608638611'],
        ];
    }

}