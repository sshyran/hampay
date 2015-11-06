<?php

use \Hametuha\HamPay\Pattern\UnitTest;

class GmoCcTest extends UnitTest
{

    protected static $order_id = '';

    protected static $member_id = '';

    protected static $access_key = '';

    protected static $access_pass = '';

    protected static $card_seq = false;

    /**
     * Set up test suite
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        static::$order_id = 'tran-' . time();
        static::$member_id = 'member-'.time();
    }


    public function testCreditCard()
    {
        // Execution
        $auth = \Hametuha\HamPay\Service\GMO\Operation\CC\ExecTran::exec([
            'OrderID' => static::$order_id,
            'Method' => \Hametuha\HamPay\Service\GMO\Method::IKKATU,
            'JobCd' => \Hametuha\HamPay\Service\GMO\JobCode::AUTH,
            'Amount' => 1000,
            'CardNo' => '4111111111111111',
            'Expire' => '1901',
            'SecurityCode' => '123',
        ]);
        // Assertion
        $this->assertArrayHasKey('AccessID', $auth);
        $this->assertArrayHasKey('AccessPass', $auth);
        $this->assertArrayHasKey('OrderID', $auth);
        $this->assertEquals(static::$order_id, $auth['OrderID']);
        $this->assertArrayHasKey('Forward', $auth);
        $this->assertArrayHasKey('Approve', $auth);
        $this->assertArrayHasKey('TranID', $auth);
        $this->assertArrayHasKey('TranDate', $auth);
        $this->assertArrayHasKey('CheckString', $auth);
        // Save access key
        static::$access_key = $auth['AccessID'];
        static::$access_pass = $auth['AccessPass'];
    }

    /**
     * @depends testCreditCard
     */
    public function testSaveMember()
    {
        // Save member
        $member = \Hametuha\HamPay\Service\GMO\Operation\CC\SaveMember::exec([
            'MemberID' => static::$member_id,
            'MemberName' => 'TestUser',
        ]);
        // Assertion
        $this->assertEquals(static::$member_id, $member['MemberID']);
    }

    /**
     * @depends testSaveMember
     */
    public function testSaveCard()
    {
        // Save Credit card
        $card = \Hametuha\HamPay\Service\GMO\Operation\CC\SaveTradedCard::exec([
            'OrderID' => static::$order_id,
            'MemberID' => static::$member_id,
        ]);
        // Assertion
        $this->assertArrayHasKey('CardSeq', $card);
        $this->assertArrayHasKey('CardNo', $card);
        $this->assertArrayHasKey('Forward', $card);
        // Save card sequence
        static::$card_seq = $card['CardSeq'];
    }

    /**
     * @depends testSaveCard
     */
    public function testExistence()
    {
        // Check card existence
        $card = \Hametuha\HamPay\Service\GMO\Operation\CC\SearchCard::exec([
            'MemberID' => static::$member_id,
            'SeqMode' => 0,
            'CardSeq' => static::$card_seq,
        ]);
        // Assertion
        $this->assertEquals(static::$card_seq, $card['CardSeq']);
        // Delete Card
        $result = \Hametuha\HamPay\Service\GMO\Operation\CC\DeleteCard::exec([
            'MemberID' => static::$member_id,
            'CardSeq' => static::$card_seq,
        ]);
        // Assertion
        $this->assertEquals(static::$card_seq, $result['CardSeq']);
        // Delete member
        $member = \Hametuha\HamPay\Service\GMO\Operation\CC\DeleteMember::exec([
            'MemberID' => static::$member_id,
        ]);
        // Assertion
        $this->assertEquals(static::$member_id, $member['MemberID']);
    }
}
