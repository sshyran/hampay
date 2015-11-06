<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\EndPoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class SaveCard extends Common
{

    protected static $params = [
        'SiteID' => true,
        'SitePass' => true,
        'MemberID' => true,
        'SeqMode' => false,
        'CardSeq' => false,
        'DefaultFlag' => false,
        'CardName' => false,
        'CardNo' => true,
        'CardPass' => false,
        'Expire' => true,
        'HolderName' => false,

    ];

    protected static $result_params = [
        'CardSeq' => true,
        'CardNo' => true,
        'Forward' => false,
    ];

    protected static $entry_point = EndPoints::SAVE_CARD;
}
