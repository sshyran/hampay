<?php

namespace Hametuha\HamPay\Service\GMO;


use Hametuha\HamPay\Pattern\CredentialBase;
use Hametuha\HamPay\Util\i18n;
use Respect\Validation\Validator;

/**
 * GMO shop credentials
 *
 * @package Hametuha\HamPay\Service\GMO
 * @property-read bool $sandbox
 * @property-read string $shop_id
 * @property-read string $shop_pass
 * @property-read string $site_id
 * @property-read string $site_pass
 */
class Credential extends CredentialBase
{
    /**
     * Override this to validate setting
     *
     * @throws \Exception
     * @return bool
     */
    public function validate()
    {
        $errors = [];
        foreach (['shop_id', 'shop_pass', 'site_id', 'site_pass'] as $key) {
            $value = $this->{$key};
            if (empty($value)) {
                $errors[] = i18n::sp('%s is empty.', $key);
            }
        }
        if (!isset($this->creds['sandbox'])) {
            $errors[] = i18n::sp('Sandbox should be explicitly specified.');
        }
        if ($errors) {
            throw new \Exception(implode("\n", $errors), 500);
        }
        return true;
    }


}
