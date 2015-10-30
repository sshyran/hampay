<?php

namespace Hametuha\HamPay\Pattern;

use Hametuha\HamPay\Service\GMO\Credential;

abstract class UnitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Set up test suite
     */
    protected function setUp()
    {
        $base_dir = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
        // Create log dir
        define('HAMPAY_LOG_DIR', $base_dir . DIRECTORY_SEPARATOR . 'log');
        if (!is_dir(HAMPAY_LOG_DIR)) {
            if (!mkdir(HAMPAY_LOG_DIR, 0755)) {
                throw new \Exception(sprintf('Log directory %s doesn\'t exist.', HAMPAY_LOG_DIR));
            }
        }
        // Set credentials
        $cred = $base_dir .DIRECTORY_SEPARATOR.'credential.json';
        $cred = json_decode(file_get_contents($cred), true);
        $gmo = $cred['gmo'];
        $gmo['sandbox'] = true;
        Credential::set($gmo);
    }


    /**
     * Remove ePub directory
     */
    protected function tearDown()
    {

    }

}
