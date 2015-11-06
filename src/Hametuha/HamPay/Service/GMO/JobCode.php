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
     * Cancellation
     *
     */
    const CANCEL = 'CANCEL';

    /**
     * Invalid transaction
     */
    const VOID = 'VOID';

    /**
     * Returned
     */
    const RETURN1 = 'RETURN';

    /**
     * Returned over 2 month
     */
    const RETURNX = 'RETURNX';

    /**
     * Simple authorized
     */
    const SAUTH = 'SAUTH';

    /**
     * Not sold(registered as 3D secure)
     */
    const AUTHENTICATED = 'AUTHENTICATED';

    /**
     *
     */
    const UNPROCESSED = 'UNPROCESSED';

}
