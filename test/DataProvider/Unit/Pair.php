<?php


namespace KobensTest\Currency\DataProvider\Unit;

use Kobens\Currency\Currency as C;

class Pair
{
    public function testGetSymbol() : array
    {
        $params = [];
        foreach (['', '/', '_', '-', '+', 'foo', 'bar'] as $s) {
            $params = \array_merge($params, [
                [C::getInstance('btc'), C::getInstance('eth'), $s, "btc{$s}eth"],
                [C::getInstance('btc'), C::getInstance('ltc'), $s, "btc{$s}ltc"],
                [C::getInstance('btc'), C::getInstance('usd'), $s, "btc{$s}usd"],
                [C::getInstance('btc'), C::getInstance('zec'), $s, "btc{$s}zec"],

                [C::getInstance('eth'), C::getInstance('btc'), $s, "eth{$s}btc"],
                [C::getInstance('eth'), C::getInstance('ltc'), $s, "eth{$s}ltc"],
                [C::getInstance('eth'), C::getInstance('usd'), $s, "eth{$s}usd"],
                [C::getInstance('eth'), C::getInstance('zec'), $s, "eth{$s}zec"],

                [C::getInstance('ltc'), C::getInstance('btc'), $s, "ltc{$s}btc"],
                [C::getInstance('ltc'), C::getInstance('eth'), $s, "ltc{$s}eth"],
                [C::getInstance('ltc'), C::getInstance('usd'), $s, "ltc{$s}usd"],
                [C::getInstance('ltc'), C::getInstance('zec'), $s, "ltc{$s}zec"],

                [C::getInstance('usd'), C::getInstance('btc'), $s, "usd{$s}btc"],
                [C::getInstance('usd'), C::getInstance('eth'), $s, "usd{$s}eth"],
                [C::getInstance('usd'), C::getInstance('ltc'), $s, "usd{$s}ltc"],
                [C::getInstance('usd'), C::getInstance('zec'), $s, "usd{$s}zec"],

                [C::getInstance('zec'), C::getInstance('btc'), $s, "zec{$s}btc"],
                [C::getInstance('zec'), C::getInstance('eth'), $s, "zec{$s}eth"],
                [C::getInstance('zec'), C::getInstance('ltc'), $s, "zec{$s}ltc"],
                [C::getInstance('zec'), C::getInstance('usd'), $s, "zec{$s}usd"],
            ]);
        }
        return $params;
    }

    public function testGetBase() : array
    {
        return [
            [C::getInstance('btc'), C::getInstance('eth'), C::getInstance('btc')],
            [C::getInstance('btc'), C::getInstance('ltc'), C::getInstance('btc')],
            [C::getInstance('btc'), C::getInstance('usd'), C::getInstance('btc')],
            [C::getInstance('btc'), C::getInstance('zec'), C::getInstance('btc')],

            [C::getInstance('eth'), C::getInstance('btc'), C::getInstance('eth')],
            [C::getInstance('eth'), C::getInstance('ltc'), C::getInstance('eth')],
            [C::getInstance('eth'), C::getInstance('usd'), C::getInstance('eth')],
            [C::getInstance('eth'), C::getInstance('zec'), C::getInstance('eth')],

            [C::getInstance('ltc'), C::getInstance('btc'), C::getInstance('ltc')],
            [C::getInstance('ltc'), C::getInstance('eth'), C::getInstance('ltc')],
            [C::getInstance('ltc'), C::getInstance('usd'), C::getInstance('ltc')],
            [C::getInstance('ltc'), C::getInstance('zec'), C::getInstance('ltc')],

            [C::getInstance('usd'), C::getInstance('btc'), C::getInstance('usd')],
            [C::getInstance('usd'), C::getInstance('eth'), C::getInstance('usd')],
            [C::getInstance('usd'), C::getInstance('ltc'), C::getInstance('usd')],
            [C::getInstance('usd'), C::getInstance('zec'), C::getInstance('usd')],

            [C::getInstance('zec'), C::getInstance('btc'), C::getInstance('zec')],
            [C::getInstance('zec'), C::getInstance('eth'), C::getInstance('zec')],
            [C::getInstance('zec'), C::getInstance('ltc'), C::getInstance('zec')],
            [C::getInstance('zec'), C::getInstance('usd'), C::getInstance('zec')],
        ];
    }

    public function testGetQuote() : array
    {
        return [
            [C::getInstance('btc'), C::getInstance('eth'), C::getInstance('eth')],
            [C::getInstance('btc'), C::getInstance('ltc'), C::getInstance('ltc')],
            [C::getInstance('btc'), C::getInstance('usd'), C::getInstance('usd')],
            [C::getInstance('btc'), C::getInstance('zec'), C::getInstance('zec')],

            [C::getInstance('eth'), C::getInstance('btc'), C::getInstance('btc')],
            [C::getInstance('eth'), C::getInstance('ltc'), C::getInstance('ltc')],
            [C::getInstance('eth'), C::getInstance('usd'), C::getInstance('usd')],
            [C::getInstance('eth'), C::getInstance('zec'), C::getInstance('zec')],

            [C::getInstance('ltc'), C::getInstance('btc'), C::getInstance('btc')],
            [C::getInstance('ltc'), C::getInstance('eth'), C::getInstance('eth')],
            [C::getInstance('ltc'), C::getInstance('usd'), C::getInstance('usd')],
            [C::getInstance('ltc'), C::getInstance('zec'), C::getInstance('zec')],

            [C::getInstance('usd'), C::getInstance('btc'), C::getInstance('btc')],
            [C::getInstance('usd'), C::getInstance('eth'), C::getInstance('eth')],
            [C::getInstance('usd'), C::getInstance('ltc'), C::getInstance('ltc')],
            [C::getInstance('usd'), C::getInstance('zec'), C::getInstance('zec')],

            [C::getInstance('zec'), C::getInstance('btc'), C::getInstance('btc')],
            [C::getInstance('zec'), C::getInstance('eth'), C::getInstance('eth')],
            [C::getInstance('zec'), C::getInstance('ltc'), C::getInstance('ltc')],
            [C::getInstance('zec'), C::getInstance('usd'), C::getInstance('usd')],
        ];
    }

    /**
     * @todo add more tests with more currency variations
     */
    public function testGetBaseQty() : array
    {
        return [
            [C::getInstance('btc'), C::getInstance('usd'), '1.00',   '1',    '1'],
            [C::getInstance('btc'), C::getInstance('usd'), '2.50',   '1',    '2.5'],
            [C::getInstance('btc'), C::getInstance('usd'), '5000',   '7500', '0.66666666'],
            [C::getInstance('btc'), C::getInstance('usd'), '123.45', '1234', '0.10004051'],
        ];
    }

    /**
     * @todo add more tests with more currency variations
     */
    public function testGetQuoteQty() : array
    {
        return [
            [C::getInstance('btc'), C::getInstance('usd'), '1',          '1',       '1'],
            [C::getInstance('btc'), C::getInstance('usd'), '0.5',        '5000',    '2500'],
            [C::getInstance('btc'), C::getInstance('usd'), '1.23456789', '1234.56', '1524.1481342784'],
            [C::getInstance('btc'), C::getInstance('usd'), '0.66666666', '7500',    '4999.99995'],
            [C::getInstance('eth'), C::getInstance('btc'), '1.234567',   '0.03733', '0.04608638611'],
        ];
    }

}