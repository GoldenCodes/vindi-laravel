<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Models;

/**
 * Class PaymentProfileService
 * @package GoldenCodes\VindiLaravel\Services
 */
class PaymentProfileService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\PaymentProfile::class;

    public function newModel($attributes = []) {
        return Models\PaymentProfileModel::make($attributes);
    }
}