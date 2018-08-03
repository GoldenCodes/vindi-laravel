<?php

namespace GoldenCodes\VindiLaravel\Library\AdditionalSDKServices;

use Vindi\Resource;

/**
 * Class Role
 *
 * @package Vindi
 */
class Role extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'roles';
    }
}
