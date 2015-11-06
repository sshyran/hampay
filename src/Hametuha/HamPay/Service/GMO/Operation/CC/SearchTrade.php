<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\Operation\Common;

class SearchTrade extends Common
{

    protected static $params = [
        'ShopID' => true,
        'ShopPass' => true,
        'OrderID' => true,
    ];

    protected static $result_params = [
        'OrderID' => true,
        'Status' => true,
        'ProcessDate' => true,
        'JobCd' => false,
        'AccessID' => false,
        'AccessPass' => false,
        'Amount' => false,
        'SiteID' => false,
        'MemberID' => false,
        'CardNo' => false,
        'Expire' => false,
        'Method' => false,
        'PayTimes' => false,
        'Forward' => false,
        'TranID' => false,
        'Approve' => false,
        'ClientField1' => false,
        'ClientField2' => false,
        'ClientField3' => false,
    ];
}