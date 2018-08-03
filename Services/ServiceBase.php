<?php

namespace GoldenCodes\VindiLaravel\Services;

use GoldenCodes\Base\Exception\CustomResponseException;
use GoldenCodes\VindiLaravel\Models\ModelBase;
use Illuminate\Database\Eloquent\Collection;
use Vindi\Exceptions\RequestException;

/**
 * Serviço responsável pela comunicação com o Vindi
 * @package GoldenCodes\VindiLaravel\Services
 */
abstract class ServiceBase {

    /** @var \Vindi\Resource $vindiSDK <Instância do serviço do SDK> */
    protected $vindiSDK;

    /** @var string $vindiSDKClass */
    protected $vindiSDKClass;

    /** @var ServiceBase $_instance */
    protected static $_instance;

    private function __construct() {
        $this->vindiSDK = new $this->vindiSDKClass;
    }

    /**
     * Singleton
     * @return ServiceBase
     */
    public static function getInstance(): ServiceBase {
        if (!isset(static::$_instance) || get_class(static::$_instance) != static::class) {
            static::$_instance = new static;
        }

        return static::$_instance;
    }

    /**
     * Retorna o primeiro item encontrado
     *
     * @param array $filter
     * @param array $params
     * @return ModelBase
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function first(array $filter = [], $params = []) {
        return $this
            ->all($filter, array_merge(['per_page' => 1], $params))
            ->first();
    }

    /**
     * Busca o primeiro item ou retorna uma nova instância
     *
     * @param array $filter
     * @return ModelBase
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function firstOrNew(array $filter = []) {
        return $this->first($filter) ?? $this->newModel();
    }

    /**
     * Busca o item pelo ID
     *
     * @param int $id
     * @return ModelBase
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     */
    public function find(int $id) {
        try {
            return $this->newModel((array) $this->vindiSDK->get($id));
        } catch (RequestException $e) {
            if($e->getCode() == 404) {
                return $this->newModel();
            }

            throw $e;
        }
    }

    /**
     * Busca o item pelo ID ou lança uma exception
     *
     * @param int $id
     * @throws CustomResponseException
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     */
    public static function findOrFail(int $id) {
        $instance = static::getInstance();

        $item = $instance->find($id);

        if(empty($item->getKey())) {
            throw new CustomResponseException('Not found', 404);
        }

        return $item;
    }

    /**
     * Busca todos os itens
     *
     * @param array $filter
     * @return Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function all(array $filter = [], $params = []) {
        if(!empty($filter)) {
            $params['query'] = $this->getQuery($filter);
        }

        return $this->newCollection($this->vindiSDK->all($params));
    }

    /**
     * Cria ou atualiza um item no Vindi
     *
     * @param ModelBase $model
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     */
    public function save(ModelBase $model) {
        if(!empty($model->getKey())) {
            $this->vindiSDK->update($model->getKey(), $model->toArray());
        } else {
            $model->fill((array) $this->vindiSDK->create($model->toArray()));
        }
    }

    /**
     * Efetua uma requisição de post
     *
     * @param ModelBase $model
     * @param null $additionalEndpoint
     * @return mixed
     * @throws RequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     */
    public function post(ModelBase $model, $additionalEndpoint = null) {
        return $this->vindiSDK->post($model->getKey(), $additionalEndpoint);
    }

    /**
     * Envia uma requisição de delete
     *
     * @param ModelBase $model
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(ModelBase $model): bool {
        try {
            if(!empty($model->getKey())) {
                $this->vindiSDK->delete($model->getKey());
                return true;
            } else {
                return false;
            }
        } catch(\Exception $e) {
            return false;
        }
    }

    /**
     * Cria uma collection
     *
     * @param array $items
     * @return Collection
     */
    private function newCollection(array $items = []) {

        $models = array_map(function($data) {
            return $this->newModel((array) $data);
        }, $items);

        return new Collection($models);
    }

    /**
     * Método utilizado para instanciar as Models do Vindi
     *
     * @param $array $attributes
     * @return ModelBase
     */
    abstract public function newModel($attributes = []);

    /**
     * Método cria a string de query
     *
     * @param array $filter
     * @return string
     */
    private function getQuery(array $filter = []) {
        if(empty($filter)) {
            return null;
        }

        return implode(' AND ', array_map(function($key) use($filter) {
            return "$key={$filter[$key]}";
        }, array_keys($filter)));
    }
}