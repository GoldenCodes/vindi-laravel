<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\DiscountModel;

/**
 * Class DiscountService
 * @package GoldenCodes\VindiLaravel\Services
 */
class DiscountService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Discount::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(DiscountModel::class)::make($attributes);
    }
}