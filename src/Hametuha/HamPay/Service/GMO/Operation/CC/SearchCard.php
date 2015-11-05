<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\Operation\Common;

class SearchCard extends Common
{
    protected static $params = [
        'SiteID', 'SitePass', 'MemberID', 'SeqMode'
    ];

    protected static $result_params = [
        'CardSeq', 'DefaultFlag', 'CardNo', 'Expire', 'DeleteFlag'
    ];
}
