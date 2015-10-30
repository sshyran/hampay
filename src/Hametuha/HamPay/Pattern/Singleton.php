<?php

namespace Hametuha\HamPay\Pattern;

/**
 * Singleton pattern
 *
 * @package Hametuha\HamPay\Pattern
 */
abstract class Singleton
{

    /**
     * @var null
     */
    private static $instances = [];

    /**
     * Constructor
     *
     * @param array $setting
     */
    protected function __construct(array $setting = [])
    {
        // Override this if required.
    }

    /**
     * Get instance
     *
     * @param array $setting
     * @return static
     */
    public static function getInstance(array $setting = [])
    {
        $class_name = get_called_class();
        if (!isset(self::$instances[$class_name])) {
            self::$instances[$class_name] = new $class_name($setting);
        }
        return self::$instances[$class_name];
    }
}
