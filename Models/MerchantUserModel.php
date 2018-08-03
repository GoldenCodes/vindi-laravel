<?php

namespace GoldenCodes\VindiLaravel\Models;

/**
 * Class MerchantUserModel
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/#!/merchant_users
 *
 * @property string name
 * @property string email
 * @property int role_id
 */
class MerchantUserModel extends ModelBase {

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'role_id'
    ];

    public static function getValidationRules(): array {
        return [
            "name" => "required",
            "email" => "required",
            "role_id" => "required",
        ];
    }
}