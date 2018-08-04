<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\CustomerModel;

/**
 * Class CustomerService
 * @package GoldenCodes\VindiLaravel\Services
 */
class CustomerService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Customer::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(CustomerModel::class)::make($attributes);
    }
}