<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class AlterTran extends Common
{

    protected static $params = [
        'ShopID' => true,
        'ShopPass' => true,
        'AccessID' => true,
        'AccessPass' => true,
        'JobCd' => true,
    ];

    protected static $result_params = [
        'AccessID' => true,
        'AccessPass' => true,
        'Forward' => false,
        'Approve' => false,
        'TranID' => true,
        'TranDate' => true,
    ];

    protected static $entry_point = EndPoints::ALTER_TRAN;

}