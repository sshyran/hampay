<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


class SearchCard
{
    protected static $params = [
        'SiteID', 'SitePass', 'MemberID', 'SeqMode'
    ];

    protected static $result_params = [
        'CardSeq', 'DefaultFlag', 'CardNo', 'Expire', 'DeleteFlag'
    ];
}
