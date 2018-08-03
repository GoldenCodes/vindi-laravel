<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\DiscountService;

/**
 * Class DiscountModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/discounts
 *
 * @property int product_item_id
 * @property string discount_type
 * @property float percentage
 * @property float amount
 * @property int quantity
 * @property int cycles
 */
class DiscountModel extends ModelBase {

    public $timestamps = false;

    protected static $vindiService = DiscountService::class;

    const DISCOUNT_TYPE_PERCENTAGE = 'percentage';
    const DISCOUNT_TYPE_AMOUNT     = 'amount';
    const DISCOUNT_TYPE_QUANTITY   = 'quantity';

    protected $fillable = [
        "product_item_id",
        "discount_type",
        "percentage",
        "amount",
        "quantity",
        "cycles"
    ];

    public static function getValidationRules(): array {
        return [
            "discount_type" => "required",
        ];
    }
}