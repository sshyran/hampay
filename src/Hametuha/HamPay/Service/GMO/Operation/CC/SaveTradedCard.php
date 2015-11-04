<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class SaveTradedCard extends Common
{

    protected static $params = [
        'ShopID', 'ShopPass',
        'OrderID', 'SiteID', 'SitePass',
        'MemberID',
    ];

    protected static $result_params = [
        'CardSeq', 'CardNo', 'Forward',
    ];

    protected static $entry_point = EndPoints::TRADED_CARD;

}
