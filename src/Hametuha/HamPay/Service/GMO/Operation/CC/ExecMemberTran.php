<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


class ExecMemberTran extends ExecTran
{

    protected static $params = [
        'AccessID' => true,
        'AccessPass' => true,
        'OrderID' => true,
        'Method' => true,
        'PayTimes' => false,
        'SiteID' => true,
        'SitePass' => true,
        'MemberID' => true,
        'SeqMode' => false,
        'CardSeq' => true,
        'CardPass' => false,
        'SecurityCode' => false,
        'ClientField1' => false,
        'ClientField2' => false,
        'ClientField3' => false,
        'ClientFieldFlag' => false,
    ];

}
