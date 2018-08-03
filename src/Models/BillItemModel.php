<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class BillItemModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property int product_id
 * @property string product_code
 * @property float amount
 * @property string description
 * @property int quantity
 * @property PricingSchemaModel pricing_schema
 */
class BillItemModel extends ModelBase {

    protected $fillable = [
        "product_id",
        "product_code",
        "amount",
        "description",
        "quantity",
        "pricing_schema",
    ];

    public $timestamps = false;
}