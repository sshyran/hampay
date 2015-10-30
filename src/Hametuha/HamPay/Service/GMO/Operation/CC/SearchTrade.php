<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\Operation\Common;

class SearchTrade extends Common
{

    protected static $params = ['ShopID', 'ShopPass', 'OrderID'];

    protected static $result_params = [
        'OrderID', 'Status', 'ProcessDate',
        'JobCd', 'AccessID', 'AccessPass', 'Amount', 'SiteID',
        'MemberID', 'CardNo', 'Expire', 'Method', 'PayTimes',
        'Forward', 'TranID', 'Approve'
    ];
}