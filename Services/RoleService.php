<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\VindiLaravel\Library\AdditionalSDKServices\Role;
use GoldenCodes\VindiLaravel\Models;

/**
 * Class RoleService
 * @package GoldenCodes\VindiLaravel\Services
 */
class RoleService extends ServiceBase {

    protected $vindiSDKClass = Role::class;

    public function newModel($attributes = []) {
        return Models\RoleModel::make($attributes);
    }
}