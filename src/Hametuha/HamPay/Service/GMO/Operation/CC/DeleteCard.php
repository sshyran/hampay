<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class DeleteCard extends Common
{

    protected static $params = [
        'SiteID' => true,
        'SitePass' => true,
        'MemberID' => true,
        'SeqMode' => false,
        'CardSeq' => true,
    ];

    protected static $result_params = [
        'CardSeq' => true,
    ];

    protected static $entry_point = EndPoints::DELETE_CARD;
}