<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


class ExecMemberTran extends ExecTran
{

    protected static $params = [
        'AccessID', 'AccessPass',
        'OrderID', 'Method', 'PayTimes',
        'SiteID', 'SitePass', 'MemberID',
        'CardSeq',
    ];

}
