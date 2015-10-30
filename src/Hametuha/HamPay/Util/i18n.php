<?php

namespace Hametuha\HamPay\Util;

/**
 * String helper
 * @package Hametuha\HamPay\Util
 */
class i18n
{

    /**
     * printf for i18n
     *
     * @param $string
     */
    public static function p($string)
    {
        echo call_user_func_array([get_called_class(), 'sp'], func_get_args());
    }

    /**
     * sprintf for i18n
     *
     * @param $string
     * @return string
     */
    public static function sp($string)
    {
        if (function_exists('__')) {
            $args = func_get_args();
            if (1 < count($args)) {
                $args[0] = __($args[0], 'hampay');
                return call_user_func_array('sprintf', $args);
            } else {
                return __($string, 'hampay');
            }
        } else {
            return call_user_func_array('sprintf', func_get_args());
        }
    }


}
