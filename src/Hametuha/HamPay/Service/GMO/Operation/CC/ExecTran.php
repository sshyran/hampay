<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\Endpoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class ExecTran extends Common
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

    protected static $entry_point = Endpoints::EXEC_TRAN;

    /**
     * Add access ID
     *
     * @param array $params
     * @return array
     */
    public static function preProcess($params)
    {
        $result = EntryTran::exec($params);
        static::$storage['AccessID'] = $result['AccessID'];
        static::$storage['AccessPass'] = $result['AccessPass'];
        return array_merge($result, $params);
    }

    /**
     * Post-process result
     *
     * @param array $result
     * @return mixed
     */
    public static function postProcess($result)
    {
        $result['AccessID'] = static::$storage['AccessID'];
        $result['AccessPass'] = static::$storage['AccessPass'];
        return $result;
    }


}
