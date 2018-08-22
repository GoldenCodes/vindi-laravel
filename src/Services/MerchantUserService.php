<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Library\AdditionalSDKServices\MerchantUser;
use GoldenCodes\VindiLaravel\Models\MerchantUserModel;

/**
 * Class MerchantUserService
 * @package GoldenCodes\VindiLaravel\Services
 */
class MerchantUserService extends ServiceBase {

    protected $vindiSDKClass = MerchantUser::class;

    public function newModel($attributes = []) {
        return resolve(MerchantUserModel::class)::make($attributes);
    }
}