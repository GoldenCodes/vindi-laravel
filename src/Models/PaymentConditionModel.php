<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PaymentConditionModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property float penalty_fee_value
 * @property string penalty_fee_type
 * @property float daily_fee_value
 * @property string daily_fee_type
 * @property int after_due_days
 * @property PaymentConditionDiscountModel[] payment_condition_discounts
 */
class PaymentConditionModel extends ModelBase {

    public $timestamps = false;

    protected $fillable = [
        "penalty_fee_value",
        "penalty_fee_type",
        "daily_fee_value",
        "daily_fee_type",
        "after_due_days",
        "payment_condition_discounts",
    ];
}