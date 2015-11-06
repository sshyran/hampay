<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class ChangeTran extends AlterTran
{

    protected static $params = [
        'ShopID' => true,
        'ShopPass' => true,
        'AccessID' => true,
        'AccessPass' => true,
        'JobCd' => true,
        'Amount' => true,
        'Tax' => false,
    ];

    protected static $entry_point = EndPoints::CHANGE_TRAN;

}