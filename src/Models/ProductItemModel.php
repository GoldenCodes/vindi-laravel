<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class ProductItemModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property int product_id
 * @property int cycles
 * @property int quantity
 * @property PricingSchemaModel pricing_schema
 * @property DiscountModel[] discounts
 */
class ProductItemModel extends ModelBase {

    protected $fillable = [
        "product_id",
        "cycles",
        "quantity",
        "pricing_schema",
        "discounts",
    ];

    public $timestamps = false;
}