<?php

namespace GoldenCodes\VindiLaravel\Library\AdditionalSDKServices;

use Vindi\Resource;

/**
 * Class MerchantUser
 *
 * @package Vindi
 */
class MerchantUser extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'merchant_users';
    }
}
