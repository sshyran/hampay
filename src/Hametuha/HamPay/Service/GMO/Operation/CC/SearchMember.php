<?php

namespace Hametuha\HamPay\Service\GMO\Operation\CC;


use Hametuha\HamPay\Service\GMO\Endpoints;
use Hametuha\HamPay\Service\GMO\Operation\Common;

class SearchMember extends Common
{

    protected static $params = ['SiteID', 'SitePass', 'MemberID'];

    protected static $result_params = ['MemberID', 'MemberName', 'DeleteFlag'];

    protected static $entry_point = Endpoints::SEARCH_MEMBER;

}
