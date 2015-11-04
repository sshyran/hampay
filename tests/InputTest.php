<?php

use Hametuha\HamPay\Util\Input;

class InputTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Input
     */
    private $input = null;

    public function setUp()
    {
        // Make instance
        $this->input = Input::getInstance();
    }

    public function testGet()
    {
        // Get $_GET.
        $_GET['foo'] = 'var';
        $this->assertEquals('var', $this->input->get('foo'));
        // Get default value.
        $this->assertEquals('default_value', $this->input->get('not_exists', 'default_value'));

    }

    public function testPost()
    {
        // Get $_POST.
        $_POST['foo'] = 'var';
        $this->assertEquals('var', $this->input->post('foo'));
        // Get default value.
        $this->assertEquals('default_value', $this->input->post('not_exists', 'default_value'));
    }

    public function testRequest()
    {
        // Get $_REQUEST.
        $_REQUEST['muu'] = 'waa';
        $this->assertEquals('waa', $this->input->request('muu'));
        // Get default value.
        $this->assertEquals('requests_default', $this->input->get('not_exists', 'requests_default'));
    }
}
