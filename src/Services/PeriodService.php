<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\PeriodModel;

/**
 * Class PeriodService
 * @package GoldenCodes\VindiLaravel\Services
 */
class PeriodService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Period::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(PeriodModel::class)::make($attributes);
    }
}