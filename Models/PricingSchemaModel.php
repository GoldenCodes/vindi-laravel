<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PricingSchemaModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property float price
 * @property float minimum_price
 * @property string schema_type
 * @property array pricing_ranges
 */
class PricingSchemaModel extends ModelBase {

    public $timestamps = false;

    protected $fillable = [
        "price",
        "minimum_price",
        "schema_type",
        "pricing_ranges",
    ];

    protected $required = ["price"];
}