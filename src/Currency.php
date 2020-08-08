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

    private function __construct(string $symbol)
    {
        if (!\array_key_exists($symbol, self::$currencies)) {
            throw new \InvalidArgumentException("Invalid Currency \"$symbol\"");
        }
        $this->symbol = $symbol;
        $this->name = self::$currencies[$symbol]['name'];
        $this->unit = self::$currencies[$symbol]['unit'];
        $this->subunit = self::$currencies[$symbol]['subunit'];
        $this->scale = self::$currencies[$symbol]['scale'];
    }

    public static function getInstance(string $symbol): CurrencyInterface
    {
        if (!\array_key_exists($symbol, self::$instances)) {
            self::$instances[$symbol] = new self($symbol);
        }
        return self::$instances[$symbol];
    }

    public static function getSymbols(): array
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
