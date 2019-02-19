<?php

namespace KobensTest\Currency\TestAsset;

use \Kobens\Currency\AbstractCurrency;

class FooCurrency extends AbstractCurrency
{
    const CURRENCY_TYPE          = 'foo';
    const CURRENCY_NAME          = 'foo dollar';
    const MAIN_UNIT              = 'fungus';
    const MAIN_UNIT_ABBREVIATION = 'fun';
    const SUB_UNIT               = 'spore';
    const DENOMINATION           = 10;
    const PAIR_IDENTIFIER        = 'fungi';
    const CACHE_IDENTIFIER       = 'psilocybe';
}