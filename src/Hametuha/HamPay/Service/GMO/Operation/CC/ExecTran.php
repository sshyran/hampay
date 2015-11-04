<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;

use Hametuha\HamPay\Service\GMO\EndPoints;
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

    protected static $entry_point = EndPoints::EXEC_TRAN;

    /**
     * Add access ID
     *
     * @param array $params
     * @return array
     */
    public static function preProcess($params)
    {
        if (!isset($params['AccessID']) || !isset($params['AccessPass'])) {
            $result = EntryTran::exec($params);
            static::$storage['AccessID'] = $result['AccessID'];
            static::$storage['AccessPass'] = $result['AccessPass'];
            foreach (['JobCd', 'Amount'] as $code) {
                if (isset($params[$code])) {
                    unset($params[$code]);
                }
            }
            return array_merge($result, $params);
        } else {
            static::$storage['AccessID'] = $params['AccessID'];
            static::$storage['AccessPass'] = $params['AccessPass'];
            return $params;
        }
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
