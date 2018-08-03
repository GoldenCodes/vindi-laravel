<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Models;

/**
 * Class CustomerService
 * @package GoldenCodes\VindiLaravel\Services
 */
class CustomerService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Customer::class;

    public function newModel($attributes = []) {
        return Models\CustomerModel::make($attributes);
    }
}