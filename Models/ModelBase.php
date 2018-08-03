<?php

namespace GoldenCodes\VindiLaravel\Models;

use GoldenCodes\Base\Traits\hasValidation;
use GoldenCodes\VindiLaravel\Services\ServiceBase;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Concerns;

/**
 * Model baseada no conceito do Laravel e adaptado ao Vindi
 * @package GoldenCodes\VindiLaravel\Models
 * @see https://vindi.github.io/api-docs/dist/
 */
abstract class ModelBase implements Arrayable {

    use Concerns\HasAttributes;
    use Concerns\GuardsAttributes;
    use Concerns\HidesAttributes;
    use Concerns\HasTimestamps;
    use hasValidation;

    /**
     * Not filled attributes
     *
     * @var array
     */
    protected $extra_attributes = [];

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated_at';

    /**
     * Chave primária da model.
     *
     * @var int $primaryKey
    */
    protected $primaryKey = 'id';

    /**
     * Classe referente ao serviço do Vindi
     * Utilzado para métodos de save/delete
     *
     * @var ServiceBase
     */
    protected static $vindiService = ServiceBase::class;

    /**
     * ModelBase constructor.
     *
     * @param array $attributes
     */
    public function __construct($attributes = []) {
        $this->fill($attributes);
    }

    /**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);

        if(empty($this->getAttribute($key))) {
            $this->setExtraAttributeValue($key, $value);
        }
    }

    public function __isset($key) {
        return !is_null($this->getAttribute($key));
    }

    /**
     * @return array
     */
    public function getExtraAttributes(): array {
        return $this->extra_attributes;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getExtraAttribute($key) {
        return $this->extra_attributes[$key] ?? null;
    }

    /**
     * @param array $extra_attributes
     */
    public function setExtraAttributeValue($key, $value) {
        $this->extra_attributes[$key] = $value;
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        return $this->casts;
    }

    /**
     * Fill the model with an array of attributes.
     *
     * @param  array  $attributes
     * @return $this
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fill(array $attributes) {

        foreach ($attributes as $key => $value) {
            if ($this->isFillable($key)) {
                $this->setAttribute($key, $value);
            } else {
                $this->setExtraAttributeValue($key, $value);
            }
        }

        return $this;
    }

    /**
     * @return int|null
     */
    public function getKeyName() {
        return $this->primaryKey;
    }

    /**
     * @return int|null
     */
    public function getKey() {
        return $this->getAttribute($this->getKeyName());
    }

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (! $key) {
            return;
        }

        // If the attribute exists in the attribute array or has a "get" mutator we will
        // get the attribute's value. Otherwise, we will proceed as if the developers
        // are asking for a relationship's value. This covers both types of values.
        if (array_key_exists($key, $this->attributes) ||
            $this->hasGetMutator($key)) {
            return $this->getAttributeValue($key);
        }

        // Here we will determine if the model base class itself contains this given key
        // since we don't want to treat any of those methods as relationships because
        // they are all intended as helper methods and none of these are relations.
        if (method_exists(self::class, $key)) {
            return;
        }
        return;
    }

    /**
     * @return array
     */
    public function toArray() {
        return array_map(function ($value) {
            return $value instanceof Arrayable ? $value->toArray() : (is_array($value) ? array_map(function($val) {
                return $val instanceof Arrayable ? $val->toArray() : $val;
            }, $value) : $value);
        }, $this->attributesToArray());
    }

    /**
     * Gera uma instancia da model
     *
     * @param array $attributes
     * @return ModelBase
     */
    public static function make($attributes = []) {
        $instance = new static;
        $instance->fill($attributes);

        return $instance;
    }

    /**
     * Salva o item no Vindi
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function save() {
        static::$vindiService::getInstance()->save($this);
    }

    /**
     * Deleta o item no Vindi
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete() {
        static::$vindiService::getInstance()->delete($this);
    }
}