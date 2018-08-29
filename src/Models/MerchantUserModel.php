<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\VindiLaravel\Services\MerchantUserService;

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

    protected static $vindiService = MerchantUserService::class;

    protected $fillable = [
        'id',
        'name',
        'email',
        'role_id'
    ];

    public function getValidationRules(): array {
        return [
            "name" => "required",
            "email" => "required",
            "role_id" => "required",
        ];
    }
}