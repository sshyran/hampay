<?php

use \Hametuha\HamPay\Pattern\UnitTest;

class GmoCcTest extends UnitTest
{

    public function testCreaditCard()
    {

        $order_id = 'tran-' . time();

        $auth = \Hametuha\HamPay\Service\GMO\Operation\CC\ExecTran::exec([
            'OrderID' => $order_id,
            'Method' => \Hametuha\HamPay\Service\GMO\Method::IKKATU,
            'JobCd' => \Hametuha\HamPay\Service\GMO\JobCode::AUTH,
            'Amount' => 1000,
            'CardNo' => '4111111111111111',
            'Expire' => '1901',
            'SecurityCode' => '123',
        ]);

        $this->assertArrayHasKey('AccessID', $auth);
        $this->assertArrayHasKey('AccessPass', $auth);
        $this->assertArrayHasKey('OrderID', $auth);
        $this->assertEquals($order_id, $auth['OrderID']);
        $this->assertArrayHasKey('Forward', $auth);
        $this->assertArrayHasKey('Approve', $auth);
        $this->assertArrayHasKey('TranID', $auth);
        $this->assertArrayHasKey('TranDate', $auth);
        $this->assertArrayHasKey('CheckString', $auth);

    }

}