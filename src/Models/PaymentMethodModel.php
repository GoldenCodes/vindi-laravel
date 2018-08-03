<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class PaymentMethodModel
 * @package GoldenCodes\VindiLaravel\Models
 *
 * @property int id
 * @property string public_name
 * @property string name
 * @property string code
 * @property string type
 * @property string status
 * @property string settings
 * @property string set_subscription_on_success
 * @property bool allow_as_alternative
 * @property PaymentCompanyModel[] payment_companies
 * @property int maximum_attempts
 * @property string created_at
 * @property string updated_at
 */
class PaymentMethodModel extends ModelBase {

    const TYPE_BOLETO = 'bank_slip';
    const TYPE_CREDIT_CARD = 'credit_card';

    public $timestamps = false;

    protected $guarded = [];

    protected static $singleton = true;
}