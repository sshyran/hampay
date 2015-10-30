<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\Endpoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class AlterTran extends Common
{

    protected static $params = [
        'ShopID', 'ShopPass', 'AccessID', 'AccessPass',
        'JobCd'
    ];

    protected static $result_params = [
        'AccessID', 'AccessPass', 'Forward',
        'Approve', 'TranID', 'TranDate'
    ];

    protected static $entry_point = Endpoints::ALTER_TRAN;

}