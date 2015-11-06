<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\EndPoints;

class ExecTran extends EntryBeforeExec
{


    protected static $params = [
        'AccessID' => true,
        'AccessPass' => true,
        'OrderID' => true,
        'Method' => true,
        'PayTimes' => false,
        'CardNo' => true,
        'Expire' => true,
        'SecurityCode' => false,
        'PIN' => false,
        'ClientField1' => false,
        'ClientField2' => false,
        'ClientField3' => false,
        'ClientFieldFlag' => false,
    ];

    protected static $result_params = [
        'OrderID' => true,
        'Forward' => false,
        'Method' => false,
        'Approve' => false,
        'TranID' => false,
        'TranDate' => true,
        'CheckString' => true,
        'ClientField1' => false,
        'ClientField2' => false,
        'ClientField3' => false,
    ];

    protected static $entry_point = EndPoints::EXEC_TRAN;
}
