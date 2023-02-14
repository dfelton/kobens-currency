<?php

declare(strict_types=1);

namespace Kobens\Currency;

/**
 * TODO: Remove magic capabilities
 * TODO: Move currencies to individual files.
 *
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
        'xtz'  => ['name' => 'Tezos',    'unit' => 'XTZ',      'subunit' => 'Mutez',         'scale' => 6],
        'zec'  => ['name' => 'Zcash',    'unit' => 'Zcash',    'subunit' => 'Zatoshi',       'scale' => 8],

        // Fiat
        'usd' => ['name' => 'US Dollar', 'unit' => 'Dollar',   'subunit' => 'Cent',    'scale' => 2],

        // Stable Coins
        'dai'   => ['name' => 'Dai Stablecoin',            'unit' => 'DAI',   'subunit' => '-', 'scale' => 18],
        'usdt'  => ['name' => 'Tether',                    'unit' => 'USDT',  'subunit' => '-', 'scale' => 18],
        'lusd'  => ['name' => 'Liquidity USD',             'unit' => 'LUSD',  'subunit' => '-', 'scale' => 6],
        'gusd'  => ['name' => 'Gemini USD',                'unit' => 'GUSD',  'subunit' => '-', 'scale' => 6],
        'busd'  => ['name' => 'Binance USD',               'unit' => 'BUSD',  'subunit' => '-', 'scale' => 6],
        'usdc'  => ['name' => 'USD Coin',                  'unit' => 'USDC',  'subunit' => '-', 'scale' => 6],

        // Wrapped Coins / Tokens
        // Scale is probably incorrect
        'efil'  => ['name' => 'Wrapped Filecoin',          'unit' => 'EFIL',  'subunit' => '-', 'scale' => 6],
        'tbtc'  => ['name' => 'tBTC',                      'unit' => 'TBTC',  'subunit' => '-', 'scale' => 6],
        'wcfg'  => ['name' => 'Wrapped Centrifuge',        'unit' => 'WCFG',  'subunit' => '-', 'scale' => 18],
        'wton'  => ['name' => 'Wrapped TON Crystal',       'unit' => 'WTON',  'subunit' => '-', 'scale' => 6],
        'wbtc'  => ['name' => 'Wrapped Bitcoin',           'unit' => 'WBTC',  'subunit' => '-', 'scale' => 6],
        'wnxm'  => ['name' => 'Wrapped Nexus Mutual',      'unit' => 'WNXM','subunit' => '-', 'scale' => 6],

        // ERC-20 Compatible Tokens
        '1inch' => ['name' => '1inch',                     'unit' => '1INCH', 'subunit' => '-', 'scale' => 18],
        'aave'  => ['name' => 'Aave',                      'unit' => 'AAVE',  'subunit' => '-', 'scale' => 18],
        'alcx'  => ['name' => 'Alchemix',                  'unit' => 'ALCX',  'subunit' => '-', 'scale' => 18],
        'amp'   => ['name' => 'Amp Token',                 'unit' => 'AMP',   'subunit' => '-', 'scale' => 18],
        'ankr'  => ['name' => 'Ankr',                      'unit' => 'ANKR',  'subunit' => '-', 'scale' => 18],
        'api3'  => ['name' => 'API3',                      'unit' => 'API3',  'subunit' => '-', 'scale' => 18],
        'ash'   => ['name' => 'Burn',                      'unit' => 'ASH',   'subunit' => '-', 'scale' => 18],
        'audio' => ['name' => 'Audius',                    'unit' => 'AUDIO', 'subunit' => '-', 'scale' => 18],
        'axs'   => ['name' => 'Axie Infinity',             'unit' => 'AXS',   'subunit' => '-', 'scale' => 18],
        'bal'   => ['name' => 'Balancer',                  'unit' => 'BAL',   'subunit' => '-', 'scale' => 18],
        'bat'   => ['name' => 'Basic Attention Token',     'unit' => 'BAT',   'subunit' => '-', 'scale' => 18],
        'bnt'   => ['name' => 'Bancor Network Token',      'unit' => 'BNT',   'subunit' => '-', 'scale' => 18],
        'bond'  => ['name' => 'BondBridge',                'unit' => 'BOND',  'subunit' => '-', 'scale' => 18],
        'comp'  => ['name' => 'Compound Governance Token', 'unit' => 'COMP',  'subunit' => '-', 'scale' => 18],
        'cube'  => ['name' => 'Somnium Space CUBE',        'unit' => 'CUBE',  'subunit' => '-', 'scale' => 18],
        'crv'   => ['name' => 'Curve DAO Token',           'unit' => 'DAO',   'subunit' => '-', 'scale' => 18],
        'ctx'   => ['name' => 'Cryptex',                   'unit' => 'CTX',   'subunit' => '-', 'scale' => 18],
        'cvc'   => ['name' => 'Civic',                     'unit' => 'CVC',   'subunit' => '-', 'scale' => 18],
        'elon'  => ['name' => 'Dogelon Mars',              'unit' => 'ELON',  'subunit' => '-', 'scale' => 18],
        'enj'   => ['name' => 'Enjin Coin',                'unit' => 'ENJ',   'subunit' => '-', 'scale' => 18],
        'ens'   => ['name' => 'Ethereum Name Service',     'unit' => 'ENS',   'subunit' => '-', 'scale' => 18],
        'fet'   => ['name' => 'Fetch AI',                  'unit' => 'FET',   'subunit' => '-', 'scale' => 18],
        'ftm'   => ['name' => 'Fantom',                    'unit' => 'FTM',   'subunit' => '-', 'scale' => 18],
        'gala'  => ['name' => 'Gala',                      'unit' => 'GALA',  'subunit' => '-', 'scale' => 18],
        'grt'   => ['name' => 'The Graph',                 'unit' => 'GRT',   'subunit' => '-', 'scale' => 18],
        'inj'   => ['name' => 'Injective Protocol',        'unit' => 'INJ',   'subunit' => '-', 'scale' => 18],
        'knc'   => ['name' => 'Kyber Network',             'unit' => 'KNC',   'subunit' => '-', 'scale' => 18],
        'kp3r'  => ['name' => 'Keep3rV1',                  'unit' => 'KP3R',  'subunit' => '-', 'scale' => 18],
        'link'  => ['name' => 'Chainlink',                 'unit' => 'LINK',  'subunit' => '-', 'scale' => 18],
        'lpt'   => ['name' => 'Livepeer',                  'unit' => 'LPT',   'subunit' => '-', 'scale' => 18],
        'lrc'   => ['name' => 'Loopring',                  'unit' => 'LRC',   'subunit' => '-', 'scale' => 18],
        'luna'  => ['name' => 'Terra',                     'unit' => 'LUNA',  'subunit' => '-', 'scale' => 18],
        'mana'  => ['name' => 'Decentraland',              'unit' => 'MANA',  'subunit' => '-', 'scale' => 18],
        'mask'  => ['name' => 'Mask Network',              'unit' => 'MASK',  'subunit' => '-', 'scale' => 18],
        'matic' => ['name' => 'Polygon',                   'unit' => 'MATIC', 'subunit' => '-', 'scale' => 18],
        'mc'    => ['name' => 'Merit Circle',              'unit' => 'MC',    'subunit' => '-', 'scale' => 18],
        'mco2'  => ['name' => 'Moss Carbon Credit',        'unit' => 'MCO2',  'subunit' => '-', 'scale' => 18],
        'mir'   => ['name' => 'Mirror',                    'unit' => 'MIR',   'subunit' => '-', 'scale' => 18],
        'mkr'   => ['name' => 'MakerDAO',                  'unit' => 'MKR',   'subunit' => '-', 'scale' => 18],
        'nmr'   => ['name' => 'Numeraire',                 'unit' => 'NMR',   'subunit' => '-', 'scale' => 18],
        'oxt'   => ['name' => 'Orchid',                    'unit' => 'OXT',   'subunit' => '-', 'scale' => 18],
        'paxg'  => ['name' => 'PAX Gold',                  'unit' => 'PAXG',  'subunit' => '-', 'scale' => 18],
        'qnt'   => ['name' => 'Quant',                     'unit' => 'QNT',   'subunit' => '-', 'scale' => 18],
        'rad'   => ['name' => 'Radicle',                   'unit' => 'RAD',   'subunit' => '-', 'scale' => 18],
        'rare'  => ['name' => 'SuperRare',                 'unit' => 'RARE',  'subunit' => '-', 'scale' => 18],
        'ren'   => ['name' => 'RenVM',                     'unit' => 'REN',   'subunit' => '-', 'scale' => 18],
        'rndr'  => ['name' => 'Render',                    'unit' => 'RNDR',  'subunit' => '-', 'scale' => 18],
        'sand'  => ['name' => 'The Sandbox',               'unit' => 'SAND',  'subunit' => '-', 'scale' => 18],
        'shib'  => ['name' => 'Shiba Inu',                 'unit' => 'SHIB',  'subunit' => '-', 'scale' => 18],
        'skl'   => ['name' => 'SKALE Token',               'unit' => 'SKL',   'subunit' => '-', 'scale' => 18],
        'slp'   => ['name' => 'Smooth Love Potion',        'unit' => 'SLP',   'subunit' => '-', 'scale' => 18],
        'snx'   => ['name' => 'Synthetix',                 'unit' => 'SNX',   'subunit' => '-', 'scale' => 18],
        'spell' => ['name' => 'Spell',                     'unit' => 'SPELL', 'subunit' => '-', 'scale' => 18],
        'storj' => ['name' => 'Storj',                     'unit' => 'STORJ', 'subunit' => '-', 'scale' => 18],
        'sushi' => ['name' => 'SushiSwap',                 'unit' => 'SUSHI', 'subunit' => '-', 'scale' => 18],
        'uma'   => ['name' => 'Universal Market Access',   'unit' => 'UMA',   'subunit' => '-', 'scale' => 18],
        'uni'   => ['name' => 'Uniswap',                   'unit' => 'UNI',   'subunit' => '-', 'scale' => 18],
        'ust'   => ['name' => 'TerraUSD',                  'unit' => 'UST',   'subunit' => '-', 'scale' => 18],
        'yfi'   => ['name' => 'Yearn Finance',             'unit' => 'YFI',   'subunit' => '-', 'scale' => 18],
        'zrx'   => ['name' => '0x',                        'unit' => 'ZRX',   'subunit' => '-', 'scale' => 18],

        // I don't even know at this point...
        // Scale is probably wrong below
        // We need this for trading purposes within kobens/kobens-gemini at the moment and that is it
        'ach'   => ['name' => 'Alchemy Pay',               'unit' => 'ACH',  'subunit' => '-', 'scale' => 6],
        'ada'   => ['name' => 'Cardano',                   'unit' => 'ADA',  'subunit' => '-', 'scale' => 6],
        'ali'   => ['name' => 'Alethea Artificial Liquid Intelligence','unit' => 'ALI', 'subunit' => '-', 'scale' => 6],
        'ape'   => ['name' => 'ApeCoin',                   'unit' => 'APE',  'subunit' => '-', 'scale' => 6],
        'atom'  => ['name' => 'Cosmos',                    'unit' => 'ATOM', 'subunit' => '-', 'scale' => 6],
        'avax'  => ['name' => 'Avalanche',                 'unit' => 'AVAX', 'subunit' => '-', 'scale' => 6],
        'bico'  => ['name' => 'Biconomy',                  'unit' => 'BICO', 'subunit' => '-', 'scale' => 6],
        'brd'   => ['name' => 'Bread',                     'unit' => 'BRD',  'subunit' => '-', 'scale' => 6],
        'csp'   => ['name' => 'Caspian',                   'unit' => 'CSP',  'subunit' => '-', 'scale' => 6],
        'chz'   => ['name' => 'Chiliz',                    'unit' => 'CHZ',  'subunit' => '-', 'scale' => 6],
        'ern'   => ['name' => 'Ethernity Chain',           'unit' => 'ERN',  'subunit' => '-', 'scale' => 6],
        'eul'   => ['name' => 'Euler Finance',             'unit' => 'EUL',  'subunit' => '-', 'scale' => 6],
        'ddx'   => ['name' => 'DerivaDao',                 'unit' => 'DDX',  'subunit' => '-', 'scale' => 6],
        'dpi'   => ['name' => 'DeFi Pulse Index',          'unit' => 'DPI',  'subunit' => '-', 'scale' => 6],
        'fida'  => ['name' => 'Bonfida',                   'unit' => 'FIDA', 'subunit' => '-', 'scale' => 6],
        'frax'  => ['name' => 'Frax',                      'unit' => 'FRAX', 'subunit' => '-', 'scale' => 6],
        'fxs'   => ['name' => 'Frax Share',                'unit' => 'FRAX', 'subunit' => '-', 'scale' => 6],
        'gal'   => ['name' => 'Galxe',                     'unit' => 'GAL',  'subunit' => '-', 'scale' => 6],
        'gfi'   => ['name' => 'Goldfinch',                 'unit' => 'GFI',  'subunit' => '-', 'scale' => 6],
        'gmt'   => ['name' => 'STEPN',                     'unit' => 'GMT',  'subunit' => '-', 'scale' => 6],
        'gnt'   => ['name' => 'Golem',                     'unit' => 'GNT',  'subunit' => '-', 'scale' => 6],
        'ilv'   => ['name' => 'Illuvium',                  'unit' => 'ILV',  'subunit' => '-', 'scale' => 6],
        'index' => ['name' => 'Index Cooperative',         'unit' => 'INDEX','subunit' => '-', 'scale' => 6],
        'iotx'  => ['name' => 'IoTeX',                     'unit' => 'IOTX', 'subunit' => '-', 'scale' => 6],
        'jam'   => ['name' => 'Geojam',                    'unit' => 'JAM',  'subunit' => '-', 'scale' => 6],
        'keep'  => ['name' => 'Keep Network',              'unit' => 'KEEP', 'subunit' => '-', 'scale' => 6],
        'ldo'   => ['name' => 'Lido DAO Token',            'unit' => 'LDO',  'subunit' => '-', 'scale' => 6],
        'loom'  => ['name' => 'Loom',                      'unit' => 'LOOM', 'subunit' => '-', 'scale' => 6],
        'lqty'  => ['name' => 'Liquidity',                 'unit' => 'LQTY', 'subunit' => '-', 'scale' => 6],
        'metis' => ['name' => 'Metis',                     'unit' => 'METIS','subunit' => '-', 'scale' => 6],
        'mim'   => ['name' => 'Magic Internet Money',      'unit' => 'MIM',  'subunit' => '-', 'scale' => 6],
        'mpl'   => ['name' => 'Maple',                     'unit' => 'MPL',  'subunit' => '-', 'scale' => 6],
        'ocean' => ['name' => 'Ocean',                     'unit' => 'OCEAN','subunit' => '-', 'scale' => 6],
        'omg'   => ['name' => 'OMG Network',               'unit' => 'OMG',  'subunit' => '-', 'scale' => 6],
        'orca'  => ['name' => 'Orca',                      'unit' => 'ORCA', 'subunit' => '-', 'scale' => 6],
        'pla'   => ['name' => 'PlayDapp',                  'unit' => 'PLA',  'subunit' => '-', 'scale' => 6],
        'qrdo'  => ['name' => 'Qredo',                     'unit' => 'QRDO', 'subunit' => '-', 'scale' => 6],
        'ray'   => ['name' => 'Raydium',                   'unit' => 'RAY',  'subunit' => '-', 'scale' => 6],
        'rbn'   => ['name' => 'Ribbon Finance',            'unit' => 'RBN',  'subunit' => '-', 'scale' => 6],
        'revv'  => ['name' => 'REVV',                      'unit' => 'REVV', 'subunit' => '-', 'scale' => 6],
        'rly'   => ['name' => 'Rally',                     'unit' => 'RLY',  'subunit' => '-', 'scale' => 6],
        'samo'  => ['name' => 'Samoyedcoin',               'unit' => 'SAMO', 'subunit' => '-', 'scale' => 6],
        'sbr'   => ['name' => 'Saber',                     'unit' => 'SBR',  'subunit' => '-', 'scale' => 6],
        'sol'   => ['name' => 'Solana',                    'unit' => 'SOL',  'subunit' => '-', 'scale' => 6],
        'toke'  => ['name' => 'Tokemak',                   'unit' => 'TOKE', 'subunit' => '-', 'scale' => 6],
        'tru'   => ['name' => 'TrueFi',                    'unit' => 'TRU',  'subunit' => '-', 'scale' => 6],
        'rfr'   => ['name' => 'Refereum',                  'unit' => 'RFR',  'subunit' => '-', 'scale' => 6],
        'xlm'   => ['name' => 'Stellar Lumens',            'unit' => 'XLM',  'subunit' => '-', 'scale' => 6],
        'xrp'   => ['name' => 'XRP',                       'unit' => 'XRP',  'subunit' => '-', 'scale' => 6],
        'zbc'   => ['name' => 'Zebec Protocol',            'unit' => 'ZBC',  'subunit' => '-', 'scale' => 6],
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
