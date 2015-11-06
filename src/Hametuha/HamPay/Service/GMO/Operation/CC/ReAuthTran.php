<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

class ReAuthTran extends AlterTran
{

    protected static $params = [
        'ShopID' => true,
        'ShopPass' => true,
        'AccessID' => true,
        'AccessPass' => true,
        'JobCd' => true,
        'Amount' => true,
        'Tax' => false,
        'Method' => true,
        'PayTimes' => false,
    ];

}