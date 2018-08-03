<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\CustomerService;

/**
 * Class CustomerModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/customers
 *
 * @property int id
 * @property string name
 * @property string email
 * @property string registry_code
 * @property string code
 * @property string notes
 * @property string metadata
 * @property AddressModel address
 * @property PhoneModel[] phones
 */
class CustomerModel extends ModelBase {

    public $timestamps = false;

    protected static $vindiService = CustomerService::class;

    protected $fillable = [
        "id",
        "name",
        "email",
        "registry_code",
        "code",
        "notes",
        "metadata",
        "address",
        "phones",
    ];

    public function getValidationRules(): array {
        return [
            "name" => "required",
            "email" => "required",
        ];
    }
}