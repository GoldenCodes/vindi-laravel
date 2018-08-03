<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PaymentConditionDiscountModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property float value
 * @property string value_type
 * @property int days_before_due
 */
class PaymentConditionDiscountModel extends ModelBase {

    public $timestamps = false;

    protected $fillable = [
        "value",
        "value_type",
        "days_before_due",
    ];
}