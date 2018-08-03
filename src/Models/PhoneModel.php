<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PhoneModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property string phone_type
 * @property string number
 * @property string extension
 */
class PhoneModel extends ModelBase {

    public $timestamps = false;

    protected $fillable = [
        "phone_type",
        "number",
        "extension",
    ];
}