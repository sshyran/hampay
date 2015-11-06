<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class DeleteMember extends Common
{

    protected static $params = [
        'SiteID' => true,
        'SitePass' => true,
        'MemberID' => true,
    ];

    protected static $result_params = [
        'MemberID' => true,
    ];

    protected static $entry_point = EndPoints::DELETE_MEMBER;
}
