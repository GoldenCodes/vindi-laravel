<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\SubscriptionService;

/**
 * Class SubscriptionModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/subscriptions
 *
 * @property int id
 * @property string start_at
 * @property int plan_id
 * @property int customer_id
 * @property string code
 * @property string payment_method_code
 * @property int installments
 * @property string billing_trigger_type
 * @property int billing_trigger_day
 * @property int billing_cycles
 * @property mixed metadata
 * @property ProductItemModel[] product_items
 * @property PaymentProfileModel payment_profile
 */
class SubscriptionModel extends ModelBase {

    public $timestamps = false;

    protected static $vindiService = SubscriptionService::class;

    protected $fillable = [
        "id",
        "start_at",
        "plan_id",
        "customer_id",
        "code",
        "payment_method_code",
        "installments",
        "billing_trigger_type",
        "billing_trigger_day",
        "billing_cycles",
        "metadata",
        "product_items",
        "payment_profile",
    ];

    public function getValidationRules(): array {
        return [
            "name" => "required",
            "email" => "required",
        ];
    }
}