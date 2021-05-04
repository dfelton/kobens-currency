<?php

namespace Kobens\Currency;

/**
 * @property-read string $name
 * @property-read string $unit
 * @property-read string $subunit
 * @property-read string $symbol
 * @property-read int $scale
 */
final class Currency implements CurrencyInterface
{
    private string $name;
    private string $unit;
    private string $subunit;
    private string $symbol;
    private int $scale;

    private static array $currencies = [
        // Digital Currencies
        'btc'  => ['name' => 'Bitcoin',  'unit' => 'Bitcoin',  'subunit' => 'Satoshi',       'scale' => 8],
        'bch'  => ['name' => 'BCash',    'unit' => 'BCash',    'subunit' => 'BCash Satoshi', 'scale' => 8],
        'doge' => ['name' => 'Dogecoin', 'unit' => 'Doge',     'subunit' => '-',             'scale' => 8],
        'eth'  => ['name' => 'Ethereum', 'unit' => 'Ether',    'subunit' => 'Wei',           'scale' => 18],
        'fil'  => ['name' => 'Filecoin', 'unit' => 'FIL',      'subunit' => '-',             'scale' => 8], // Technically, Filecoin is infinitely divisible
        'ltc'  => ['name' => 'Litecoin', 'unit' => 'Litecoin', 'subunit' => 'Litoshi',       'scale' => 8],
        'zec'  => ['name' => 'Zcash',    'unit' => 'Zcash',    'subunit' => 'Zatoshi',       'scale' => 8],

        // Fiat
        'usd' => ['name' => 'US Dollar', 'unit' => 'Dollar',   'subunit' => 'Cent',    'scale' => 2],

        // ERC-20 Compatible Tokens
        '1inch' => ['name' => '1inch',                     'unit' => '1INCH', 'subunit' => '-', 'scale' => 18],
        'aave'  => ['name' => 'Aave',                      'unit' => 'AAVE',  'subunit' => '-', 'scale' => 18],
        'amp'   => ['name' => 'Amp Token',                 'unit' => 'AMP',   'subunit' => '-', 'scale' => 18],
        'bal'   => ['name' => 'Balancer',                  'unit' => 'BAL',   'subunit' => '-', 'scale' => 18],
        'bat'   => ['name' => 'Basic Attention Token',     'unit' => 'BAT',   'subunit' => '-', 'scale' => 18],
        'bnt'   => ['name' => 'Bancor Network Token',      'unit' => 'BNT',   'subunit' => '-', 'scale' => 18],
        'bond'  => ['name' => 'BondBridge',                'unit' => 'BOND',  'subunit' => '-', 'scale' => 18],
        'comp'  => ['name' => 'Compound Governance Token', 'unit' => 'COMP',  'subunit' => '-', 'scale' => 18],
        'cube'  => ['name' => 'Somnium Space CUBE',        'unit' => 'CUBE',  'subunit' => '-', 'scale' => 18],
        'crv'   => ['name' => 'Curve DAO Token',           'unit' => 'DAO',   'subunit' => '-', 'scale' => 18],
        'enj'   => ['name' => 'Enjin Coin',                'unit' => 'ENJ',   'subunit' => '-', 'scale' => 18],
        'dai'   => ['name' => 'Dai Stablecoin',            'unit' => 'DAI',   'subunit' => '-', 'scale' => 18],
        'grt'   => ['name' => 'The Graph',                 'unit' => 'GRT',   'subunit' => '-', 'scale' => 18],
        'inj'   => ['name' => 'Injective Protocol',        'unit' => 'INJ',   'subunit' => '-', 'scale' => 18],
        'knc'   => ['name' => 'Kyber Network',             'unit' => 'KNC',   'subunit' => '-', 'scale' => 18],
        'link'  => ['name' => 'Chainlink',                 'unit' => 'LINK',  'subunit' => '-', 'scale' => 18],
        'lpt'   => ['name' => 'Livepeer',                  'unit' => 'LPT',   'subunit' => '-', 'scale' => 18],
        'lrc'   => ['name' => 'Loopring',                  'unit' => 'LRC',   'subunit' => '-', 'scale' => 18],
        'mana'  => ['name' => 'Decentraland',              'unit' => 'MANA',  'subunit' => '-', 'scale' => 18],
        'matic' => ['name' => 'Polygon',                   'unit' => 'MATIC', 'subunit' => '-', 'scale' => 18],
        'mkr'   => ['name' => 'MakerDAO',                  'unit' => 'MKR',   'subunit' => '-', 'scale' => 18],
        'oxt'   => ['name' => 'Orchid',                    'unit' => 'OXT',   'subunit' => '-', 'scale' => 18],
        'paxg'  => ['name' => 'PAX Gold',                  'unit' => 'PAXG',  'subunit' => '-', 'scale' => 18],
        'ren'   => ['name' => 'RenVM',                     'unit' => 'REN',   'subunit' => '-', 'scale' => 18],
        'sand'  => ['name' => 'The Sandbox',               'unit' => 'SAND',  'subunit' => '-', 'scale' => 18],
        'skl'   => ['name' => 'SKALE Token',               'unit' => 'SKL',   'subunit' => '-', 'scale' => 18],
        'snx'   => ['name' => 'Synthetix',                 'unit' => 'SNX',   'subunit' => '-', 'scale' => 18],
        'storj' => ['name' => 'Storj',                     'unit' => 'STORJ', 'subunit' => '-', 'scale' => 18],
        'sushi' => ['name' => 'SushiSwap',                 'unit' => 'SUSHI', 'subunit' => '-', 'scale' => 18],
        'uma'   => ['name' => 'Universal Market Access',   'unit' => 'UMA',   'subunit' => '-', 'scale' => 18],
        'uni'   => ['name' => 'Uniswap',                   'unit' => 'UNI',   'subunit' => '-', 'scale' => 18],
        'yfi'   => ['name' => 'Yearn Finance',             'unit' => 'YFI',   'subunit' => '-', 'scale' => 18],
        'zrx'   => ['name' => '0x',                        'unit' => 'ZRX',   'subunit' => '-', 'scale' => 18],
    ];

    /**
     * @var CurrencyInterface[]
     */
    private static array $instances = [];

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
