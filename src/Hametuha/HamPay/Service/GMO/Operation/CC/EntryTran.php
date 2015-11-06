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
        'ShopID' => true,
        'ShopPass' => true,
        'OrderID' => true,
        'JobCd' => true,
        'ItemCode' => false,
        'Amount' => true,
        'Tax' => false,
        'TdFlag' => false,
        'TdTenantName' => false,

    ];

    protected static $result_params = [
        'AccessID' => true,
        'AccessPass' => true,
    ];

    protected static $entry_point = EndPoints::ENTRY_TRAN;

}
