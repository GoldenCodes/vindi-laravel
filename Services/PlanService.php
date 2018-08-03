<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Models;

/**
 * Class PlanService
 * @package GoldenCodes\VindiLaravel\Services
 */
class PlanService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Plan::class;

    public function newModel($attributes = []) {
        return Models\PlanModel::make($attributes);
    }
}