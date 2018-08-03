<?php
namespace GoldenCodes\VindiLaravel\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class VindiLaravelModelProvider extends ServiceProvider
{
    static $models = [];

    public function boot() {}

    public function setModels() {
        $files = [];

        $pathModels = str_replace(["Provider"], "Models", __DIR__);

        if (File::exists($pathModels)) {
            $files = File::files($pathModels);
        }

        $namespaces = array_map(function($file) use($pathModels) {
            return "GoldenCodes\VindiLaravel\Models\\" . str_replace([".php"], "", $file->getFileName());
        }, $files);

        if(!empty($namespaces)) {
            foreach($namespaces as $namespace) {
                static::$models[$namespace] = $namespace;
            }
        }
    }

    public function register() {
        $this->setModels();
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