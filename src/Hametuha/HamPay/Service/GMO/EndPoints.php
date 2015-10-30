<?php

namespace Hametuha\HamPay\Service\GMO;

use Hametuha\HamPay\Util\i18n;
use Hametuha\HamPay\Util\Logger;
use Hametuha\HamPay\Util\Validator;

/**
 * Returns Endpoints
 */
class Endpoints
{

    const ENTRY_TRAN = '/EntryTran.idPass';

    const EXEC_TRAN = '/ExecTran.idPass';

    const ALTER_TRAN = '/AlterTran.idPass';

    const TD_VERIFY = '/SecureTran.idPass';

    const CHANGE_TRAN = '/ChangeTran.idPass';

    const SAVE_CARD = '/SaveCard.idPass';

    const DELETE_CARD = '/DeleteCard.idPass';

    const SEARCH_CARD = '/SearchCard.idPass';

    const TRADED_CARD = '/TradedCard.idPass';

    const SAVE_MEMBER = '/SaveMember.idPass';

    const DELETE_MEMBER = '/DeleteMember.idPass';

    const SEARCH_MEMBER = '/SearchMember.idPass';

    const UPDATE_MEMBER = '/UpdateMember.idPass';

    const SEARCH_TRADE = '/SearchTrade.idPass';

    const ENTRY_TRAN_SUICA = '/EntryTranSuica.idPass';

    const EXEC_TRAN_SUICA = '/ExecTranSuica.idPass';

    const ENTRY_TRAN_EDY = '/EntryTranEdy.idPass';

    const EXEC_TRAN_EDY = '/ExecTranEdy.idPass';

    const ENTRY_TRAN_CVS = '/EntryTranCvs.idPass';

    const EXEC_TRAN_CVS = '/ExecTranCvs.idPass';

    const ENTRY_TRAN_PAYEASY = '/EntryTranPayEasy.idPass';

    const EXEC_TRAN_PAYEASY = '/ExecTranPayEasy.idPass';

    const ENTRY_TRAN_PAYPAL = '/EntryTranPaypal.idPass';

    const EXEC_TRAN_PAYPAL = '/ExecTranPaypal.idPass';

    const PAYPAL_START = '/PaypalStart.idPass';

    const CANCEL_TRAN_PAYPAL = '/CancelTranPaypal.idPass';

    const ENTRY_TRAN_WEBMONEY = '/EntryTranWebmoney.idPass';

    const EXEC_TRAN_WEBMONEY = '/ExecTranWebmoney.idPass';

    const WEBMONEY_START = '/WebmoneyStart.idPass';

    const ENTRY_TRAN_AU = '/EntryTranAu.idPass';

    const EXEC_TRAN_AU = '/ExecTranAu.idPass';

    const AU_START = '/AuStart.idPass';

    const AU_CANCEL_RETURN = '/AuCancelReturn.idPass';

    const AU_SALES = '/AuSales.idPass';

    const DELETE_AU_OPEN_I_D = '/DeleteAuOpenID.idPass';

    const ENTRY_TRAN_DOCOMO = '/EntryTranDocomo.idPass';

    const EXEC_TRAN_DOCOMO = '/ExecTranDocomo.idPass';

    const DOCOMO_START = '/DocomoStart.idPass';

    const DOCOMO_CANCEL_RETURN = '/DocomoCancelReturn.idPass';

    const DOCOMO_SALES = '/DocomoSales.idPass';

    const SEARCH_TRADE_MULTI = '/SearchTradeMulti.idPass';

    /**
     * Returns endpoint root
     *
     * @param boolean $is_sandbox Default true
     * @return string
     */
    private static function getRoot($is_sandbox = true)
    {
        return $is_sandbox ? 'https://pt01.mul-pay.jp/payment' : 'https://p01.mul-pay.jp/payment';
    }

    /**
     * Get request endpoint
     *
     * @param string $endpoint
     * @return string
     */
    public static function endpoint($endpoint)
    {
        return static::getRoot(Credential::get()->sandbox) . $endpoint;
    }

    /**
     * Return result of request.
     *
     * @param string $endpoint
     * @param array $params
     * @param array $should
     * @return array
     * @throws \Exception
     */
    public static function getRequest($endpoint, $params = [], $should = [])
    {
        $params = self::getSpecifiedParams($params, $should);
        $ch = curl_init();
        $post_body = self::buildPostFields($params);
        curl_setopt_array($ch, array(
            CURLOPT_URL => static::endpoint($endpoint),
            CURLOPT_CONNECTTIMEOUT => 90,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post_body,
        ));
        Logger::write('REQUEST', "{$endpoint}\t{$post_body}");
        $result = curl_exec($ch);
        curl_close($ch);
        if (false === $result) {
            throw new \Exception(i18n::sp('Failed to connect to transaction server.'), 500);
        }
        Logger::write('RESULT', "{$endpoint}\t{$result}");
        parse_str($result, $params);
        if (isset($params['ErrInfo'])) {
            throw new \Exception(implode(',', array_map(function ($code) {
                return ErrorMessage::getErrorMessage(trim($code));
            }, explode('|', $params['ErrInfo']))), 500);
        }
        return $params;
    }


    /**
     * Convert specified key
     *
     * @param array|string $params
     * @param array $keys
     * @return array|false
     * @throws \Exception
     */
    public static function getSpecifiedParams(array $params = [], $keys = [])
    {
        $keys = (array)$keys;
        if (($lacks = Validator::lack($params, $keys))) {
            $message = i18n::sp('Required keys[%s] don\'t exist.', implode(', ', $lacks));
            throw new \Exception($message);
        }
        $param = [];
        foreach ($keys as $key) {
            switch ($key) {
                case 'SiteID':
                case 'SitePass':
                case 'ShopID':
                case 'ShopPass':
                    $prop = strtolower(preg_replace_callback('#(?<!^)(?<![A-Z])([A-Z])#', function ($match) {
                        return '_' . $match[1];
                    }, $key));
                    $param[$key] = Credential::get()->{$prop};
                    break;
                default:
                    $param[$key] = $params[$key];
                    break;
            }
        }
        return $param;
    }

    /**
     * Returns array to query string
     * @param array $params
     * @return string
     */
    private static function buildPostFields($params)
    {
        $query = array();
        foreach ($params as $key => $value) {
            switch ($key) {
//                case '':
//                    $query[] = $key . '=' . rawurlencode(trim($value));
//                    break;
                default:
                    $query[] = $key . '=' . trim($value);
                    break;
            }
        }
        return implode('&', $query);
    }
}