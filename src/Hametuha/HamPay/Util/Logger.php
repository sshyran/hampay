<?php

namespace Hametuha\HamPay\Util;

/**
 * Logger
 *
 * @package Hametuha\HamPay\Util
 */
class Logger
{
    public static function write($key, $message)
    {
        $args = func_get_args();

        $log_dir = false;

        if (defined('HAMPAY_LOG_DIR') && is_dir(HAMPAY_LOG_DIR)) {
            $log_dir = HAMPAY_LOG_DIR;
        }
        if ($log_dir) {
            $path = $log_dir . DIRECTORY_SEPARATOR . date('Y/md') . '.log';
            $dir = dirname($path);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            error_log(sprintf("%s\t%s\n", $key, $message), 3, $path);
        } else {
            error_log(sprintf("%s\t%s\n", $key, $message));
        }
    }
}
