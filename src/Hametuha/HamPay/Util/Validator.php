<?php

namespace Hametuha\HamPay\Util;


class Validator
{


    public function valid()
    {

    }

    /**
     * Test if specified params satisfies keys.
     *
     * @param array $params
     * @param array $required_keys
     * @return array If satisfied, returns empty array
     */
    public static function lack(array $params, array $required_keys = [])
    {
        $errors = [];
        foreach ($required_keys as $key) {
            switch ($key) {
                case 'SiteID':
                case 'SitePass':
                case 'ShopID':
                case 'ShopPass':
                    // do nothing
                    break;
                default:
                    if (!isset($params[$key])) {
                        $errors[] = $key;
                    }
                    break;
            }
        }
        return $errors;
    }
}
