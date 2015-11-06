<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class UpdateMember extends SaveMember
{

    protected static $entry_point = EndPoints::UPDATE_MEMBER;

}
