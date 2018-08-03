<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Models;

/**
 * Class DiscountService
 * @package GoldenCodes\VindiLaravel\Services
 */
class DiscountService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Discount::class;

    public function newModel($attributes = []) {
        return Models\DiscountModel::make($attributes);
    }
}