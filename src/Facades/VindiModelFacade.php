<?php
namespace GoldenCodes\VindiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class VindiModelFacade
 * @package GoldenCodes\VindiLaravel\Facades
 * @deprecated Use resolve() method
 */
class VindiModelFacade extends Facade {
    static $className;

    public static function get(string $className) {
        static::$className = $className;

        return resolve($className);
    }

    protected static function getFacadeAccessor() { return static::$className; }
}