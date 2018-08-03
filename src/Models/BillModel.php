<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\CustomerService;

/**
 * Class BillModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/customers
 *
 * @property int id
 * @property int customer_id
 * @property string code
 * @property int installments
 * @property string payment_method_code
 * @property string billing_at
 * @property string due_at
 * @property BillItemModel[] bill_items
 * @property mixed metadata
 * @property PaymentProfileModel payment_profile
 * @property PaymentConditionModel payment_condition
 */
class BillModel extends ModelBase {

    public $timestamps = false;

    protected static $vindiService = CustomerService::class;

    protected $fillable = [
        "id",
        "customer_id",
        "code",
        "installments",
        "payment_method_code",
        "billing_at",
        "due_at",
        "bill_items",
        "metadata",
        "payment_profile",
        "payment_condition",
    ];

    public function getValidationRules(): array {
        return [
            "name" => "required",
            "email" => "required",
        ];
    }
}