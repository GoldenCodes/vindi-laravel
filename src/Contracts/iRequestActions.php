<?php

namespace GoldenCodes\VindiLaravel\Contracts;

use GoldenCodes\Base\Exception\CustomResponseException;
use GoldenCodes\VindiLaravel\Models\ModelBase;
use Illuminate\Database\Eloquent\Collection;

interface iRequestActions {

    /**
     * Retorna o primeiro item encontrado
     * @param array $params
     * @return ModelBase
     */
    public function first(array $params = []);

    /**
     * Busca o primeiro item ou retorna uma nova instância
     * @param array $filter
     * @return ModelBase
     */
    public function firstOrNew(array $params = []);

    /**
     * Busca o item pelo ID
     * @param int $id
     * @return ModelBase
     */
    public function find(int $id);

    /**
     * Busca o item pelo ID e retorna uma nova instância caso não encontrar
     * @param int $id
     * @return ModelBase
     */
    public function findOrNew(int $id);

    /**
     * Busca o item pelo ID ou lança uma exception
     * @param int $id
     * @throws CustomResponseException
     */
    public function findOrFail(int $id);

    /**
     * Busca todos os itens de acordo com os parâmetros
     * @param array $params
     * @return Collection
     */
    public function get(array $params = []);
}