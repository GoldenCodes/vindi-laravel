<?php
namespace GoldenCodes\Base\Provider;

use GoldenCodes\VindiLaravel\Models\AddressModel;
use Illuminate\Support\ServiceProvider;

class VindiLaravelModelProvider extends ServiceProvider
{
    static $models = [
        "GoldenCodes\VindiLaravel\Models\AddressModel" => AddressModel::class,
    ];

    public function boot() {}

    public function register() {
        $this->registerModels();
    }

    public function registerModels() {
        foreach(static::$models as $key => $model) {
            $this->app->bind($key, function() use($key) {
                return new static::$models[$key];
            });
        }
    }
}