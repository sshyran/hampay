<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class SaveTradedCard extends Common
{

    protected static $params = [
        'ShopID' => true,
        'ShopPass' => true,
        'OrderID' => true,
        'SiteID' => true,
        'SitePass' => true,
        'MemberID' => true,
        'SeqMode' => false,
        'DefaultFlag' => false,
        'HolderName' => false,
    ];

    protected static $result_params = [
        'CardSeq' => true,
        'CardNo' => false,
        'Forward' => false,
    ];

    protected static $entry_point = EndPoints::TRADED_CARD;

}
