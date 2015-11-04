<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class SaveCard extends Common
{

    protected static $params = [
        'SiteID', 'SitePass', 'MemberID',
        'CardNo', 'Expire'
    ];

    protected static $result_params = ['CardSeq', 'CardNo', 'Forward'];

    protected static $entry_point = EndPoints::SAVE_CARD;
}
