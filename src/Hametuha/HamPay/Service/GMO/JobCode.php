<?php
namespace Hametuha\HamPay\Service\GMO;

/**
 * GMO's job codes
 */
class JobCode
{


    /**
     * Validity check
     *
     */
    const CHECK = 'CHECK';

    /**
     * Capture
     *
     */
    const CAPTURE = 'CAPTURE';

    /**
     * Authorization
     *
     */
    const AUTH = 'AUTH';

    /**
     * Sales
     *
     */
    const SALES = 'SALES';

    /**
     * Cancelation
     *
     */
    const CANCEL = 'CANCEL';

    const VOID = 'VOID';

    const RETURN = 'RETURN';

    const RETURNX = 'RETURNX';

    const SAUTH = 'SAUTH';

    const AUTHENTICATED = 'AUTHENTICATED';

    const UNPROCESSED = 'UNPROCESSED';

}
