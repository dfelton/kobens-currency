<?php

namespace Kobens\Currency;

final class Currency implements CurrencyInterface
{
    private $name;
    private $unit;
    private $subunit;
    private $symbol;
    private $scale;

    private static $currencies = [
        // Crypto
        'btc' => ['name' => 'Bitcoin',  'unit' => 'Bitcoin',  'subunit' => 'Satoshi', 'scale' => 8],
        'eth' => ['name' => 'Ethereum', 'unit' => 'Ether',    'subunit' => 'Wei',     'scale' => 18],
        'ltc' => ['name' => 'Litecoin', 'unit' => 'Litecoin', 'subunit' => 'Litoshi', 'scale' => 8],
        'zec' => ['name' => 'Zcash',    'unit' => 'Zcash',    'subunit' => 'Zatoshi', 'scale' => 8],
        // Fiat
        'usd' => ['name' => 'US Dollar','unit' => 'Dollar',   'subunit' => 'Cent',    'scale' => 2],
    ];

    /**
     * @var CurrencyInterface[]
     */
    private static $instances = [];

    private function __construct()
    {

    }

    public static function getInstance(string $symbol) : CurrencyInterface
    {
        if (isset(self::$instances[$symbol])) {
            return self::$instances[$symbol];
        }
        if (!isset(self::$currencies[$symbol])) {
            throw new \InvalidArgumentException("Invalid Currency \"$symbol\"");
        }
        $clone = new self();
        $clone->symbol = $symbol;
        foreach (self::$currencies[$symbol] as $key => $value) {
            $clone->$key = $value;
        }
        return self::$instances[$symbol] = $clone;
    }

    public static function getSymbols() : array
    {
        return \array_keys(self::$currencies);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getSubunit(): string
    {
        return $this->subunit;
    }

    public function getScale(): int
    {
        return $this->scale;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function __get(string $name)
    {
        switch ($name) {
            case 'name':
                return $this->name;
            case 'unit':
                return $this->unit;
            case 'subunit':
                return $this->subunit;
            case 'symbol':
                return $this->symbol;
            case 'scale':
                return $this->scale;
            default:
                throw new \Error('Invalid magic method property accessor');
        }
    }

}
