<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PaymentCompanyModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property int id
 * @property string name
 * @property string code
 */
class PaymentCompanyModel extends ModelBase {

    public $timestamps = false;

    protected $guarded = [];
}