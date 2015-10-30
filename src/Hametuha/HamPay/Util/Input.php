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
 * @method mixed get() get(string $name) Short hand for $_GET
 * @method mixed post() post(string $name) Short hand for $_POST
 * @method mixed request() request(string $name) Short hand for $_REQUEST
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
        switch ($method) {
            case 'get':
            case 'post':
            case 'request':
                if (1 === count($arguments) && isset($GLOBALS[strtoupper($method)][$arguments[0]])) {
                    return $GLOBALS[strtoupper($method)][$arguments[0]];
                } else {
                    return isset($arguments[1]) ? $arguments[1] : null;
                }
                break;
            default:
                return null;
                break;
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
                    return false;
                }
                break;
            case 'post_body':
                return file_get_contents('php://input');
                break;
            case 'remote_ip':
                return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
                break;
            default:
                return null;
                break;
        }
    }

}
