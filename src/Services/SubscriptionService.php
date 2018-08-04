<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Models\SubscriptionModel;

class SubscriptionService extends ServiceBase {

    protected $vindiSDKClass = \Vindi\Subscription::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(SubscriptionModel::class)::make($attributes);
    }
}