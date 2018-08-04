<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\PlanModel;

/**
 * Class PlanService
 * @package GoldenCodes\VindiLaravel\Services
 */
class PlanService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Plan::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(PlanModel::class)::make($attributes);
    }
}