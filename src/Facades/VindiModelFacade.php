<?php
namespace GoldenCodes\VindiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class VindiModelFacade extends Facade {
    static $className;

    public static function get(string $className) {
        static::$className = $className;

        return resolve($className);
    }

    protected static function getFacadeAccessor() { return static::$className; }
}