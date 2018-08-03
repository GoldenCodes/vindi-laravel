<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\ProductService;

/**
 * Class ProductModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/products
 *
 * @property int id
 * @property string name
 * @property string code
 * @property string unit
 * @property string status
 * @property string description
 * @property string invoice
 * @property PricingSchemaModel pricing_schema
 * @property string metadata
 */
class ProductModel extends ModelBase {

    public $timestamps = false;

    protected static $vindiService = ProductService::class;

    protected $fillable = [
        "id",
        "name",
        "code",
        "unit",
        "status",
        "description",
        "invoice",
        "pricing_schema",
        "metadata",
    ];

    public function getValidationRules(): array {
        return [
            "name" => 'required',
            "status" => 'required',
        ];
    }
}