<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class AddressModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property string street
 * @property string number
 * @property string additional_details
 * @property string zipcode
 * @property string neighborhood
 * @property string city
 * @property string state
 * @property string country
 */
class AddressModel extends ModelBase {

    public $timestamps = false;

    protected $fillable = [
        "street",
        "number",
        "additional_details",
        "zipcode",
        "neighborhood",
        "city",
        "state",
        "country",
    ];
}