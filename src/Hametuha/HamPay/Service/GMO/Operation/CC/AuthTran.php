<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

class AuthTran extends AlterTran
{

    protected static $params = [
        'ShopID', 'ShopPass', 'AccessID', 'AccessPass',
        'JobCd', 'Amount'
    ];

}