<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\PeriodService;

/**
 * Class PeriodModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/periods
 *
 * @property int id
 * @property string billing_at
 * @property int cycle
 * @property string start_at
 * @property string end_at
 * @property int duration
 * @property SubscriptionModel subscription
 * @property string created_at
 * @property string updated_at
 */
class PeriodModel extends ModelBase {

    protected static $vindiService = PeriodService::class;

    protected $guarded = [];

    public $timestamps = false;

    public function subscription() {
        return SubscriptionModel::class;
    }
}