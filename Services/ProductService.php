<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Models;

/**
 * Class ProductService
 * @package GoldenCodes\VindiLaravel\Services
 */
class ProductService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Product::class;

    public function newModel($attributes = []) {
        return Models\ProductModel::make($attributes);
    }
}