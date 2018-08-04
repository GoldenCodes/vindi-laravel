<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\ProductModel;

/**
 * Class ProductService
 * @package GoldenCodes\VindiLaravel\Services
 */
class ProductService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Product::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(ProductModel::class)::make($attributes);
    }
}