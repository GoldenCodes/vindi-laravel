<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\BillModel;

class BillService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Bill::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(BillModel::class)::make($attributes);
    }
}