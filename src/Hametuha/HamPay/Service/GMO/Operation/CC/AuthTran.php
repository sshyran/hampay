<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

class AuthTran extends AlterTran
{

    protected static $params = [
        'ShopID' => true,
        'ShopPass' => true,
        'AccessID' => true,
        'AccessPass' => true,
        'JobCd' => true,
        'Amount' => true,
    ];

}