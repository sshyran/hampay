<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\EndPoints;

class ExecTran extends EntryBeforeExec
{


    protected static $params = [
        'AccessID', 'AccessPass',
        'OrderID', 'Method',
        'CardNo', 'Expire', 'SecurityCode',
    ];

    protected static $result_params = [
        'OrderID', 'Forward', 'Method',
        'Approve', 'TranID', 'TranDate',
        'CheckString',
    ];

    protected static $entry_point = EndPoints::EXEC_TRAN;
}
