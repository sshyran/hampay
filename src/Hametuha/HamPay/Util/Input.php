<?php

namespace Hametuha\HamPay\Util;

use Hametuha\HamPay\Pattern\Singleton;

/**
 * Input helper
 *
 * @package Hametuha\HamPay\Util
 * @property-read string $request_method Request method
 * @property-read string $post_body Post body
 * @property-read string $remote_ip Remote IP address
 * @method mixed get() get($name, $default = null) Short hand for $_GET
 * @method mixed post() post($name, $default = null) Short hand for $_POST
 * @method mixed request() request($name, $default = null) Short hand for $_REQUEST
 */
final class Input extends Singleton
{


    /**
     * Magic method
     *
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    public function __call($method, array $arguments = [])
    {
        $key = $arguments[0];
        switch ($method) {
            case 'get':
                $value = isset($_GET[$key]) ? $_GET[$key] : null;
                break;
            case 'post':
                $value = isset($_POST[$key]) ? $_POST[$key] : null;
                break;
            case 'request':
                $value = isset($_REQUEST[$key]) ? $_REQUEST[$key] : null;
                break;
            default:
                return null;
                break;
        }
        if (is_null($value)) {
            return isset($arguments[1]) ? $arguments[1] : $value;
        } else {
            return $value;
        }
    }

    /**
     * @param string $name
     * @return bool|null|string
     */
    public function __get($name)
    {
        switch ($name) {
            case 'request_method':
                if (isset($_SERVER['REQUEST_METHOD'])) {
                    return $_SERVER['REQUEST_METHOD'];
                } else {
                    return '';
                }
                break;
            case 'post_body':
                return file_get_contents('php://input');
                break;
            case 'remote_ip':
                return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
                break;
            default:
                return null;
                break;
        }
    }

}
