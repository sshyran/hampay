<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class SearchCard extends Common
{
    protected static $params = [
        'SiteID' => true,
        'SitePass' => true,
        'MemberID' => true,
        'SeqMode' => true,
        'CardSeq' => false,
    ];

    protected static $result_params = [
        'CardSeq' => true,
        'DefaultFlag' => false,
        'CardName' => false,
        'CardNo' => true,
        'Expire' => true,
        'HolderName' => false,
        'DeleteFlag' => false,
    ];

    protected static $entry_point = EndPoints::SEARCH_CARD;
}
