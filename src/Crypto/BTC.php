<?php

namespace Currency\Crypto;

class BTC extends AbstractCrypto
{
    const CURRENCY_NAME          = 'Bitcoin';
    const MAIN_UNIT              = 'Bitcoin';
    const MAIN_UNIT_ABBREVIATION = 'BTC';
    const SUB_UNIT               = 'Satoshi';
    const DENOMINATION           = 8;
    const PAIR_IDENTIFIER        = 'btc';
    const CACHE_IDENTIFIER       = 'btc';
}
