<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\PaymentProfileModel;

/**
 * Class PaymentProfileService
 * @package GoldenCodes\VindiLaravel\Services
 */
class PaymentProfileService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\PaymentProfile::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(PaymentProfileModel::class)::make($attributes);
    }
}