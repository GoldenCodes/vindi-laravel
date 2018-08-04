<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Facades\VindiModelFacade;
use GoldenCodes\VindiLaravel\Library\AdditionalSDKServices\Role;
use GoldenCodes\VindiLaravel\Models\RoleModel;

/**
 * Class RoleService
 * @package GoldenCodes\VindiLaravel\Services
 */
class RoleService extends ServiceBase {

    protected $vindiSDKClass = Role::class;

    public function newModel($attributes = []) {
        return VindiModelFacade::get(RoleModel::class)::make($attributes);
    }
}