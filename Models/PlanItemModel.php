<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PlanItemModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property int cycles
 * @property int product_id
 */
class PlanItemModel extends ModelBase {

    protected $fillable = [
        "cycles",
        "product_id",
    ];

    public $timestamps = false;
}