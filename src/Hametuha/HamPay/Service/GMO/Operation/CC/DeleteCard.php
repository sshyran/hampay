<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class DeleteCard extends Common
{

    protected static $params = [
        'SiteID', 'SitePass', 'MemberID', 'CardSeq',
    ];

    protected static $result_params = ['CardSeq'];

    protected static $entry_point = EndPoints::DELETE_CARD;
}