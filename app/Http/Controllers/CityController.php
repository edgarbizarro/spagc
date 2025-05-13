<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Application\Services\CityService;
use App\Http\Resources\CityResource;

/**
 * @group Cidades
 *
 * Endpoints para gerenciamento de cidades.
 */
class CityController extends Controller
{
    public function __construct(protected CityService $service) {}

    /**
     * Listar todas as cidades
     *
     * Retorna uma lista completa de cidades cadastradas, com seus respectivos estados e clusters.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "name": "Ribeirão Preto",
     *     "state_id": 1,
     *     "cluster_id": 1,
     *     "state_name": "São Paulo",
     *     "cluster_name": "Interior Paulista"
     *   }
     * ]
     */
    public function index()
    {
        return CityResource::collection($this->service->all());
    }

    /**
     * Cadastrar uma nova cidade
     *
     * Cria uma nova cidade vinculada a um estado e a um cluster.
     *
     * @bodyParam name string required Nome da cidade. Example: Ribeirão Preto
     * @bodyParam state_id integer required ID do estado vinculado. Example: 1
     * @bodyParam cluster_id integer required ID do cluster vinculado. Example: 2
     *
     * @response 201 {
     *   "id": 1,
     *   "name": "Ribeirão Preto",
     *   "state_id": 1,
     *   "cluster_id": 2,
     *   "state_name": "São Paulo",
     *   "cluster_name": "Interior Paulista"
     * }
     */
    public function store(StoreCityRequest $request)
    {
        return new CityResource($this->service->create($request->validated()));
    }

    /**
     * Visualizar uma cidade
     *
     * Retorna os dados detalhados de uma cidade específica pelo ID.
     *
     * @urlParam id integer required ID da cidade. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Ribeirão Preto",
     *   "state_id": 1,
     *   "cluster_id": 2,
     *   "state_name": "São Paulo",
     *   "cluster_name": "Interior Paulista"
     * }
     */
    public function show(int $id)
    {
        return new CityResource($this->service->find($id));
    }

    /**
     * Atualizar uma cidade
     *
     * Atualiza os dados de uma cidade específica.
     *
     * @urlParam id integer required ID da cidade. Example: 1
     * @bodyParam name string required Nome da cidade. Example: Campinas
     * @bodyParam state_id integer required ID do estado. Example: 1
     * @bodyParam cluster_id integer required ID do cluster. Example: 2
     *
     * @response 200 {
     *   "id": 1,
     *   "name": "Campinas",
     *   "state_id": 1,
     *   "cluster_id": 2,
     *   "state_name": "São Paulo",
     *   "cluster_name": "Interior Paulista"
     * }
     */
    public function update(UpdateCityRequest $request, int $id)
    {
        return new CityResource($this->service->update($id, $request->validated()));
    }

    /**
     * Remover uma cidade
     *
     * Remove uma cidade existente pelo ID.
     *
     * @urlParam id integer required ID da cidade. Example: 1
     *
     * @response 204 {}
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->noContent();
    }
}
