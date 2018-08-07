<?php

namespace GoldenCodes\VindiLaravel\Library;

use GoldenCodes\Base\Exception\CustomResponseException;
use GoldenCodes\VindiLaravel\Contracts\iRequestActions;
use GoldenCodes\VindiLaravel\Models\ModelBase;
use GoldenCodes\VindiLaravel\Services\ServiceBase;

class VindiQueryBuilder implements iRequestActions {

    /** @var VindiQueryBuilder singleton */
    protected static $queryInstance;

    /**
     * Classe referente ao serviço do Vindi
     * @var ServiceBase
     */
    private $vindiService;

    private $query = [];

    public function __construct($vindiService) {
        $this->vindiService = $vindiService;
    }

    public static function query() {
        if(empty(self::$queryInstance)) {
            self::$queryInstance = new self;
        }

        return self::$queryInstance;
    }

    public function __toString() {
        $return = "";
        $limit  = count($this->query) - 1;
        foreach ($this->query as $index => $query) {
            $return .= $query['field'].$query['operator'].$query['value'] . " ";

            if($index < $limit) {
                $return .= "{$query['condition']} ";
            }
        }

        return $return;
    }

    public function where($field, $value = null, $condition = 'AND') {
        return $this->addItem($field, "=", $value, $condition);
    }

    public function whereLike($field, $value, $condition = 'AND') {
        return $this->addItem($field, ":", $value, $condition);
    }

    public function whereHigher($field, $value, $condition = 'AND') {
        return $this->addItem($field, ">", $value, $condition);
    }

    public function whereHigherEqual($field, $value, $condition = 'AND') {
        return $this->addItem($field, ">=", $value, $condition);
    }

    public function whereLower($field, $value, $condition = 'AND') {
        return $this->addItem($field, "<", $value, $condition);
    }

    public function whereLowerEqual($field, $value, $condition = 'AND') {
        return $this->addItem($field, "<=", $value, $condition);
    }

    public function whereNot($field, $value, $condition = 'AND') {
        return $this->addItem($field, "not", $value, $condition);
    }

    private function getQueryArray() {
        return ['query' => (string)$this];
    }

    private function addItem($field, $operator, $value, $condition = 'AND') {
        $this->validateCondition($condition);

        if(is_array($field)) {
            foreach($field as $key => $val) {
                $this->addItem($key, $operator, $val, $condition);
            }

            return $this;
        } else {
            $this->query[] = [
                "field"     => $field,
                "operator"  => $operator,
                "value"     => $value,
                "condition" => $condition
            ];
        }

        return $this;
    }

    /**
     * @param $condition
     * @throws \Exception
     */
    private function validateCondition($condition) {
        if(empty($condition) || !in_array($condition, ['AND', 'OR'])) {
            throw new \Exception("Invalid condition. Available: 'AND', 'OR'");
        }
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function get(array $params = []) {
        $params['query'] = $this->getQueryArray();
        return $this->vindiService::getInstance()->get($params);
    }

    /**
     * @param array $params
     * @return ModelBase|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function first(array $params = []) {
        $params['query'] = $this->getQueryArray();
        return $this->vindiService::getInstance()->first($params);
    }

    /**
     * @param array $params
     * @return ModelBase|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function firstOrNew(array $params = []) {
        $params['query'] = $this->getQueryArray();
        return $this->vindiService::getInstance()->firstOrNew($params);
    }

    /**
     * Busca o item pelo ID
     * @param int $id
     * @return ModelBase
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function find(int $id) {
        return $this->vindiService::getInstance()->find($id);
    }

    /**
     * Busca o item pelo ID e retorna uma nova instância caso não encontrar
     * @param int $id
     * @return ModelBase
     */
    public function findOrNew(int $id) {
        return $this->vindiService::getInstance()->findOrNew($id);
    }

    /**
     * Busca o item pelo ID ou lança uma exception
     * @param int $id
     * @throws CustomResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Vindi\Exceptions\RateLimitException
     * @throws \Vindi\Exceptions\RequestException
     */
    public function findOrFail(int $id) {
        return $this->vindiService::getInstance()->findOrFail($id);
    }
}