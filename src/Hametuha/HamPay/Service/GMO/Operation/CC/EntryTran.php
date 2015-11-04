<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

/**
 * Entry transaction
 *
 * @package Hametuha\HamPay\Service\GMO\Operation\CC
 */
class EntryTran extends Common
{

    protected static $params = [
        'ShopID', 'ShopPass', 'OrderID', 'JobCd', 'Amount',
    ];

    protected static $result_params = ['AccessID', 'AccessPass'];

    protected static $entry_point = EndPoints::ENTRY_TRAN;

}