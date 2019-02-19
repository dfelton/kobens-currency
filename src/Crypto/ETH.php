<?php

namespace Kobens\Currency\Crypto;

class ETH extends AbstractCrypto
{
    const CURRENCY_NAME          = 'Ethereum';
    const MAIN_UNIT              = 'Ether';
    const MAIN_UNIT_ABBREVIATION = 'ETH';
    const SUB_UNIT               = 'Wei';
    const DENOMINATION           = 18;
    const CACHE_IDENTIFIER       = 'eth';
    const PAIR_IDENTIFIER        = 'eth';
}
