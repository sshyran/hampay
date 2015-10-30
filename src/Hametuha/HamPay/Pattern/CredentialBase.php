<?php

namespace Hametuha\HamPay\Pattern;

use Hametuha\HamPay\Util\i18n;

/**
 * CredentialBase base class
 *
 * @package Hametuha\HamPay
 */
abstract class CredentialBase extends Singleton
{

    protected $validated = false;

    protected $creds = [];

    /**
     * Constructor
     *
     * @param array $setting
     */
    protected function __construct(array $setting = [])
    {
        $this->creds = $setting;
    }


    /**
     * Override this to validate setting
     *
     * @throws \Exception
     * @return bool
     */
    public function validate()
    {
        return true;
    }

    /**
     * Set credentials
     *
     * @param array $credentials
     */
    public static function set(array $credentials = [])
    {
        $instance = static::getInstance($credentials);
        $instance->validated = $instance->validate();
    }

    /**
     * Get instance
     *
     * @throws \Exception
     */
    public static function get()
    {
        $instance = static::getInstance();
        if (!$instance->validated) {
            throw new \Exception(i18n::sp('%s is not initialized.', get_called_class()), 500);
        }
        return $instance;
    }

    /**
     * Getter
     *
     * @param string $name
     * @return null
     */
    public function __get($name)
    {
        if (isset($this->creds[$name])) {
            return $this->creds[$name];
        } else {
            return null;
        }
    }
}
